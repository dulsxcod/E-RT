<?php

namespace App\Http\Controllers;

use App\Services\WhatsAppService;
use App\Models\UserAccount;
use App\Models\Warga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class WargaController extends Controller
{
    public function index(Request $request): View
    {
        $wargas = Warga::when($request->filled('search'), function ($query, $search) use ($request) {
            $query->where('NIK', 'like', "%{$request->search}%")
                ->orWhere('nama_lengkap', 'like', "%{$request->search}%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('Warga.index', [
            'wargas' => $wargas,
        ]);
    }

    public function create(): View
    {
        return view('Warga.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'NIK' => ['required', 'string', 'max:16', 'unique:warga,NIK'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'rt' => ['required', 'string', 'max:10'],
            'kelurahan' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
        ]);

        $warga = Warga::create([
            'NIK' => $validated['NIK'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
            'rt' => $validated['rt'],
            'kelurahan' => $validated['kelurahan'],
            'kecamatan' => $validated['kecamatan'],
            'kota' => $validated['kota'],
            'status' => 'pending',
        ]);

        $password = Str::random(10);
        $token = Str::random(32);

        UserAccount::create([
            'Username' => $validated['NIK'],
            'Password' => Hash::make($password),
            'NamaLengkap' => $validated['nama_lengkap'],
            'Role' => 'Warga',
            'status' => 'pending',
            'Token' => $token,
        ]);

        $this->sendWhatsAppNotification($validated['no_hp'], $validated['NIK'], $password, $token);

        return redirect()->route('super_admin.warga')->with('success', 'Data warga berhasil ditambahkan. Akun pending menunggu aktivasi.');
    }

    public function edit(Warga $warga): View
    {
        return view('Warga.edit', [
            'warga' => $warga,
        ]);
    }

    public function update(Request $request, Warga $warga): RedirectResponse
    {
        $validated = $request->validate([
            'NIK' => ['required', 'string', 'max:16', 'unique:warga,NIK,' . $warga->id],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'rt' => ['required', 'string', 'max:10'],
            'kelurahan' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
        ]);

        $warga->update($validated);

        $userAccount = UserAccount::where('Username', $warga->NIK)->first();
        if ($userAccount) {
            $userAccount->update([
                'NamaLengkap' => $validated['nama_lengkap'],
            ]);
        }

        return back()->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Warga $warga): RedirectResponse
    {
        $userAccount = UserAccount::where('Username', $warga->NIK)->first();
        if ($userAccount) {
            $userAccount->delete();
        }

        $warga->delete();

        return back()->with('success', 'Data warga beserta akunnya berhasil dihapus.');
    }

    public function pending(): View
    {
        $wargas = Warga::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('Warga.pending', [
            'wargas' => $wargas,
        ]);
    }

    public function activate(Warga $warga): RedirectResponse
    {
        $warga->update(['status' => 'active']);

        $userAccount = UserAccount::where('Username', $warga->NIK)->first();
        if ($userAccount) {
            $userAccount->update(['status' => 'active']);
        }

        $whatsapp = new WhatsAppService;
        $token = $userAccount?->Token;

        $message = "Akun Warga Anda sudah diaktifkan!\n\n";
        $message .= "NIK (Username): {$warga->NIK}\n";

        if ($token) {
            $message .= "Token Aktivasi: {$token}\n";
        }

        $message .= "\nSilakan login dan buat password Anda.";

        $whatsapp->sendMessage($warga->no_hp, $message);

        return redirect()->route('super_admin.warga.pending')->with('success', 'Akun warga berhasil diaktifkan.');
    }

    public function showRegister(): View
    {
        return view('Warga.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'max:15'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        $userAccount = UserAccount::where('Token', $validated['token'])
            ->where('status', 'pending')
            ->first();

        if (! $userAccount) {
            return back()->withErrors(['token' => 'Token tidak valid atau akun sudah diaktifkan.']);
        }

        $warga = Warga::where('NIK', $userAccount->Username)->first();

        $userAccount->update([
            'Password' => Hash::make($validated['password']),
            'Token' => null,
            'status' => 'active',
        ]);

        if ($warga) {
            $warga->update(['status' => 'active']);
        }

        return redirect()->route('warga.login')->with('success', 'Akun berhasil diaktifkan. Silakan login.');
    }

    public function showLogin(): View
    {
        return view('Warga.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'NIK' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $user = UserAccount::where('Username', $credentials['NIK'])->first();

        if (! $user) {
            return back()->withErrors(['NIK' => 'NIK tidak ditemukan.'])->onlyInput('NIK');
        }

        if ($user->status !== 'active') {
            return back()->withErrors(['NIK' => 'Akun belum diaktifkan. Silakan hubungi admin RT.']);
        }

        if (! Hash::check($credentials['password'], $user->Password)) {
            return back()->withErrors(['password' => 'Kata sandi salah.'])->onlyInput('NIK');
        }

        if ($user->Token !== null) {
            return redirect()->route('warga.reset-password');
        }

        Auth()->login($user);

        return redirect()->route('warga.dashboard');
    }

    public function showResetPassword(): View
    {
        return view('Warga.reset-password');
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:6', 'max:15'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        $user = Auth()->user();
        $user->update([
            'Password' => Hash::make($validated['password']),
            'Token' => null,
        ]);

        return redirect()->route('warga.dashboard')->with('success', 'Password berhasil diubah.');
    }

    private function sendWhatsAppNotification(string $noHp, string $nik, ?string $password, ?string $token): void
    {
        $whatsapp = new WhatsAppService;

        $message = "Selamat, akun Warga Anda sudah dibuat!\n\n";
        $message .= "Username (NIK): {$nik}\n";

        if ($password) {
            $message .= "Password: {$password}\n";
        }

        if ($token) {
            $message .= "Token Aktivasi: {$token}\n";
        }

        $message .= "\nSilakan login dan ubah password Anda.";

        $whatsapp->sendMessage($noHp, $message);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $users = UserAccount::when($request->filled('search'), function ($query, $search) use ($request) {
            $query->where('Username', 'like', "%{$request->search}%")
                ->orWhere('Role', 'like', "%{$request->search}%");
        })
            ->orderBy('UserID')
            ->paginate(10)
            ->withQueryString();

        return view('SuperAdmin.DataUser.index', [
            'users' => $users,
            'roles' => array_keys(UserAccount::ROLE_SLUGS),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'Username' => ['required', 'string', 'max:255', 'unique:user,Username'],
            'Password' => ['required', 'string', 'min:6'],
            'NamaLengkap' => ['required', 'string', 'max:255'],
            'Foto' => ['nullable', 'string', 'max:255'],
            'Token' => ['nullable', 'string', 'max:255'],
            'Role' => ['required', 'string', 'in:' . implode(',', array_keys(UserAccount::ROLE_SLUGS))],
            'status' => ['required', 'string', 'in:active,pending'],
        ]);

        UserAccount::create([
            'Username' => $validated['Username'],
            'Password' => Hash::make($validated['Password']),
            'NamaLengkap' => $validated['NamaLengkap'],
            'Foto' => $validated['Foto'] ?? null,
            'Token' => $validated['Token'] ?? null,
            'Role' => $validated['Role'],
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, UserAccount $user): RedirectResponse
    {
        $validated = $request->validate([
            'Username' => ['required', 'string', 'max:255', 'unique:user,Username,' . $user->UserID . ',UserID'],
            'Password' => ['nullable', 'string', 'min:6'],
            'NamaLengkap' => ['required', 'string', 'max:255'],
            'Foto' => ['nullable', 'string', 'max:255'],
            'Token' => ['nullable', 'string', 'max:255'],
            'Role' => ['required', 'string', 'in:' . implode(',', array_keys(UserAccount::ROLE_SLUGS))],
            'status' => ['required', 'string', 'in:active,pending'],
        ]);

        $data = [
            'Username' => $validated['Username'],
            'NamaLengkap' => $validated['NamaLengkap'],
            'Foto' => $validated['Foto'] ?? null,
            'Token' => $validated['Token'] ?? null,
            'Role' => $validated['Role'],
            'status' => $validated['status'],
        ];

        if (! empty($validated['Password'])) {
            $data['Password'] = Hash::make($validated['Password']);
        }

        $user->update($data);

        return back()->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(UserAccount $user): RedirectResponse
    {
        if ($user->UserID === auth()->id()) {
            return back()->withErrors(['delete' => 'Anda tidak dapat menghapus akun sendiri.']);
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
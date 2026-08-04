<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('Login.index');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $user = UserAccount::where('Username', $credentials['username'])->first();

        if (! $user) {
            return back()
                ->withErrors(['username' => 'Username tidak ditemukan.'])
                ->onlyInput('username');
        }

        if (! Hash::check($credentials['password'], $user->Password)) {
            if (strlen($user->Password) < 60 && $user->Password === $credentials['password']) {
                $user->Password = Hash::make($credentials['password']);
                $user->save();
            } else {
                return back()
                    ->withErrors(['password' => 'Kata sandi salah.'])
                    ->onlyInput('username');
            }
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard.' . $user->roleSlug());
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
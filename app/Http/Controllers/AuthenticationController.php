<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        $credentials = $this->request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('member')->attempt($credentials)) {
            $this->request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::guard('member')->logout();

        $this->request->session()->invalidate();

        $this->request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        $this->request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:m_peserta,email'],
            'password' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'postcode' => ['required'],
        ]);
    }

    public function adminLogin()
    {
        $credentials = $this->request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $this->request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        $this->request->session()->invalidate();

        $this->request->session()->regenerateToken();

        return redirect('/admin-login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Province;
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

    public function registration()
    {
        $provinces = Province::get();

        return view('registrasi')->with([
            'provinces' => $provinces
        ]);
    }

    public function register()
    {
        $this->request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:m_peserta,email'],
            'password' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'provinsi' => ['required'],
            'kota' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
        ]);

        $name = $this->request->input('nama');

        $data = $this->request->only([
            'nama',
            'email',
            'password',
            'alamat',
            'no_hp',
            'provinsi',
            'kota',
            'kecamatan',
            'kelurahan',
        ]);
        $data['status_aktif'] = 1;

        $firstName = $name[0];
        $lastName = $name[1];

        $data['nama'] = "$firstName $lastName";
        $data['nama_depan'] = $firstName;
        $data['nama_belakang'] = $lastName;

        $createMember = Member::create($data);

        if($createMember){
            return redirect()->back()->with([
                'success' => true,
                'message' => 'Sukses Menambahkan Peserta',

            ],200);
        }else{
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Gagal Menambahkan Peserta'
            ],500);
        }
    }

    public function adminLogin()
    {
        $credentials = $this->request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $this->request->session()->regenerate();

            return redirect('/admin/dashboard');
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

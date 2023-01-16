<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\Models\Member;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{
    public function login()
    {
        if (Auth::guard('member')->check()) {
            $user = Auth::guard('member')->user();

            if ($user->status_aktif === 1) {
                return redirect()->intended('/');
            }

            Auth::guard('member')->logout();

            $this->request->session()->invalidate();

            $this->request->session()->regenerateToken();

            return redirect('login')->withErrors([
                'email' => 'Akun anda tidak aktif',
            ]);
        }

        $credentials = $this->request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('member')->attempt($credentials)) {
            $user = Auth::guard('member')->user();

            if ($user->status_aktif === 1) {

                $this->request->session()->regenerate();

                return redirect()->intended('/');
            }

            Auth::guard('member')->logout();

            $this->request->session()->invalidate();

            $this->request->session()->regenerateToken();

            return redirect('login')->withErrors([
                'email' => 'Akun anda tidak aktif',
            ])->onlyInput('email');
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

        if (Member::where('email', $data['email'])->exists()) {
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Email sudah digunakan'
            ],500);
        }

        $data['status_aktif'] = 0;

        $firstName = $name[0];
        $lastName = $name[1];

        $data['nama'] = "$firstName $lastName";
        $data['nama_depan'] = $firstName;
        $data['nama_belakang'] = $lastName;

        $createMember = Member::create($data);

        Mail::to($data['email'])->send(new EmailVerification($data['email']));

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

    public function loginPage()
    {
        if (Auth::guard('member')->check()) {
            return redirect()->intended('/');
        }

        return view('login',[
            "title" => "login"
        ]);
    }
    public function emailVerification()
    {
        $token = $this->request->click;

        try {
            $data = Crypt::decrypt($token);
            if($data) {
                $user = Member::where('email', $data['email'])
                    ->where('id_peserta', $data['id'])->first();

                if(!$user) {
                    return response()->json(['message' => 'User Not Found']);
                }

                $user->email_verified_at = Carbon::now();
                $user->save();

                session()->flash('message','Your Email Successfully Verified',);

                return redirect('login')->with([
                    'message' => 'Your Email Successfully Verified',
                ]);
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

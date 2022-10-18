<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        return view('profil',[
            'auth' => $auth
        ]);
    }
}

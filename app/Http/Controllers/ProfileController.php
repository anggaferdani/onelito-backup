<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        $wishlists = $auth->wishlists()->with('product.photo')->get();

        return view('profil',[
            'auth' => $auth,
            'title' => 'profil',
            'wishlists' => $wishlists
        ]);
    }
}

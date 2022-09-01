<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "home"
    ]);
});

Route::group(['prefix' => 'authentications'], function () {
    Route::post('/', [AuthenticationController::class, 'login'])->name('login.post');
});

Route::get('/auction', function () {
    return view('auction',[
        "title" => "auction"
    ]);
});

Route::get('/onelito_store', function () {
    return view('onelito_store',[
        "title" => "onelito_store"
    ]);
});

Route::get('/koi_stok', function () {
    return view('koi_stok',[
        "title" => "koi_stok"
    ]);
});

Route::get('/login', function () {
    return view('login',[
        "title" => "login"
    ]);
})->name('login');

Route::get('/registrasi', function () {
    return view('registrasi',[
    ]);
});

Route::get('/profil', function () {
    return view('profil',[
    ]);
});

Route::get('/bid', function () {
    return view('bid',[
        "title" => "auction"
    ]);
});

Route::get('/detail', function () {
    return view('detail',[
        "title" => "auction"
    ]);
});

Route::get('/event_auction', function () {
    return view('event_auction',[
        "title" => "auction"
    ]);
});

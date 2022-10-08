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

Route::get('/home', function () {
    return view('homelog',[
        "title" => "home"
    ]);
});

Route::get('/auction', function () {
    return view('auction',[
        "title" => "auction"
    ]);
});

Route::get('/auctionlog', function () {
    return view('auctionlog',[
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

Route::get('/bid2', function () {
    return view('bid2',[
        "title" => "auction"
    ]);
});

Route::get('/bid3', function () {
    return view('bid3',[
        "title" => "auction"
    ]);
});

Route::get('/bid4', function () {
    return view('bid4',[
        "title" => "auction"
    ]);
});

Route::get('/detail', function () {
    return view('detail',[
        "title" => "auction"
    ]);
});

Route::get('/detail2', function () {
    return view('detail2',[
        "title" => "auction"
    ]);
});

Route::get('/detail3', function () {
    return view('detail3',[
        "title" => "auction"
    ]);
});

Route::get('/detail4', function () {
    return view('detail4',[
        "title" => "auction"
    ]);
});

Route::get('/event_auction', function () {
    return view('event_auction',[
        "title" => "auction"
    ]);
});

Route::get('/detail_onelito_store', function () {
    return view('detail_onelito_store',[
        "title" => "onelito_store"
    ]);
});

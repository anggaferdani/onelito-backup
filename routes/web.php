<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('home',[
//         "title" => "home"
//     ]);
// });

Route::get('/homelog', function () {
    return view('homelog',[
        "title" => "home"
    ]);
});

Route::get('/admin-login', function () {
    return view('admin.pages.auth-login',[
        "title" => "home"
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/auction', [AuctionController::class, 'index'])->name('auction.index');


// MEMBER
Route::group(['middleware' => 'auth:member'], function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/auction/{idIkan}', [AuctionController::class, 'bid'])->name('auction.bid');
    Route::POST('/auction/{idIkan}', [AuctionController::class, 'bidProcess'])->name('auction.bid_process');


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
});

Route::group(['prefix' => 'authentications'], function () {
    Route::post('/', [AuthenticationController::class, 'login'])->name('login.post');

    Route::group(['prefix' => 'admin'], function () {
        Route::post('/', [AuthenticationController::class, 'adminLogin'])->name('admin.login.post');
        Route::get('/logout', [AuthenticationController::class, 'adminLogout'])->name('admin.logout');
    });
});

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/charts/sum-product-sold', [Admin\DashboardController::class, 'productSoldChart']);
    Route::get('/charts/sum-nominal-product-sold', [Admin\DashboardController::class, 'productSoldNominalChart']);
    Route::get('/charts/sum-auction-participant', [Admin\DashboardController::class, 'auctionParticipantChart']);

    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', [Admin\AdminController::class, 'index'])->name('admin.admin.index');
    });

    Route::resource('members', Admin\MemberController::class);

    Route::resource('fishes', Admin\KoiStockController::class);

    Route::resource('auction-products', Admin\EventFishController::class);

    Route::resource('auctions', Admin\EventController::class);

    Route::resource('products', Admin\ProductController::class);

    Route::resource('champion-fishes', Admin\ChampionFishController::class);

    Route::resource('orders', Admin\OrderController::class);

    Route::resource('auction-winners', Admin\AuctionWinnerController::class);
});

// Route::get('/auction', function () {
//     return view('auction',[
//         "title" => "auction"
//     ]);
// });

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

Route::get('/onelito_storelog', function () {
    return view('onelito_storelog',[
        "title" => "onelito_store"
    ]);
});

Route::get('/koi_stok', function () {
    return view('koi_stok',[
        "title" => "koi_stok"
    ]);
});

Route::get('/koi_stoklog', function () {
    return view('koi_stoklog',[
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

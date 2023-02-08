<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChampionFishController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoiStockController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WishlistController;
use App\Mail\EmailVerification;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('homelog',[
        "title" => "home"
    ]);
});

Route::get('/send-email', function () {
    $email = 'rifqizzz6@gmail.com';

    Mail::to($email)->send(new EmailVerification($email));

    return response()->json('sended');
});

Route::get('/admin-login', function () {
    return view('admin.pages.auth-login',[
        "title" => "home"
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/ls/click', [AuthenticationController::class, 'emailVerification'])->name('email.verification');

Route::get('/login', [AuthenticationController::class, 'loginPage'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/registrasi', [AuthenticationController::class, 'registration'])->name('registration');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');

Route::get('/auction', [AuctionController::class, 'index'])->name('auction.index');

Route::get('/koi_stok', [KoiStockController::class, 'index'])->name('koi_stock.index');

Route::get('/onelito_store', [StoreController::class, 'index'])->name('store.index');
Route::get('/onelito_store/{id}', [StoreController::class, 'detail'])->name('store.detail');

Route::get('/detail_koichampion', [ChampionFishController::class, 'index'])->name('koi_champion.index');

Route::get('/cities', [ServiceController::class, 'cities'])->name('home.cities');
Route::get('/districts', [ServiceController::class, 'districts'])->name('home.districts');
Route::get('/subdistricts', [ServiceController::class, 'subdistricts'])->name('home.subdistricts');

Route::get('/auction/{idIkan}', [AuctionController::class, 'bid'])->name('auction.bid');
Route::get('/auction/{idIkan}/detail', [AuctionController::class, 'detail'])->name('auction.detail');

// MEMBER
Route::group(['middleware' => 'auth:member'], function () {
    Route::GET('/wishlistlog', [WishlistController::class, 'wishlistlog']);
    Route::POST('/change-password', [AuthenticationController::class, 'changePassword']);
    Route::POST('/change-profile', [ProfileController::class, 'changeProfile']);
    Route::resource('/carts', CartController::class);
    Route::POST('/carts-order', [CartController::class, 'order']);
    Route::get('/auction-bid-now/{idIkan}', [AuctionController::class, 'bidNow'])->name('auction.bid_now');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/shoppingcart', [ProfileController::class, 'shopcart'])->name('profile.shopcart');
    Route::get('/wishlist', [ProfileController::class, 'wishlist'])->name('profile.wishlist');
    Route::get('/purchase', [ProfileController::class, 'purchase'])->name('profile.purchase');
    Route::get('/ganti_password', [ProfileController::class, 'viewChangePassword'])->name('profile.view_change_password');
    Route::POST('/auction/{idIkan}', [AuctionController::class, 'bidProcess'])->name('auction.bid_process');
    Route::resource('/wishlists', WishlistController::class);

    // Route::get('/gnti_password', function () {
    //     return view('ganti_password',[
    //         "title" => "ganti_password"
    //     ]);
    // });

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
    Route::get('/', [AuthenticationController::class, 'loginPage']);
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
    Route::get('/auction-winners-info', [Admin\AuctionWinnerController::class, 'info'])->name('admin.auction_winner.info');


    Route::resource('admins', Admin\AdminController::class);

    Route::resource('members', Admin\MemberController::class);

    Route::resource('fishes', Admin\KoiStockController::class);

    Route::resource('auction-products', Admin\EventFishController::class);

    Route::resource('auctions', Admin\EventController::class);

    Route::resource('current-auctions', Admin\CurrentAuctionController::class);

    Route::resource('products', Admin\ProductController::class);

    Route::resource('champion-fishes', Admin\ChampionFishController::class);

    Route::resource('orders', Admin\OrderController::class);

    Route::resource('auction-winners', Admin\AuctionWinnerController::class);

    Route::group(['prefix' => 'bot'], function () {
        Route::resource('member', Admin\Bot\MemberController::class)->names([
            'index' => 'bot-member.index',
            'store' => 'bot-member.store',
            'show' => 'bot-member.show',
            'create' => 'bot-member.create',
            'destroy' => 'bot-member.destroy',
            'edit' => 'bot-member.edit',
            'update' => 'bot-member.update',
        ]);

        Route::resource('user', Admin\Bot\UserController::class)->names([
            'index' => 'bot-users.index',
            'store' => 'bot-users.store',
            'show' => 'bot-users.show',
            'create' => 'bot-users.create',
            'destroy' => 'bot-users.destroy',
            'edit' => 'bot-users.edit',
            'update' => 'bot-users.update',
        ]);

        Route::resource('winner', Admin\Bot\PemenangLelangController::class)->names([
            'index' => 'bot-pemenang-lelang.index',
            'create' => 'bot-pemenang-lelang.create',
            'destroy' => 'bot-pemenang-lelang.destroy',
            'edit' => 'bot-pemenang-lelang.edit',
            'update' => 'bot-pemenang-lelang.update',
        ]);

        Route::get('data-lelang/{start_time}', [Admin\Bot\PemenangLelangController::class, 'data_lelang'])->name('data_lelang');
        Route::post('pemenang-lelang/set/{id}', [Admin\Bot\PemenangLelangController::class, 'store'])->name('bot-pemenang-lelang.store');
        Route::get('invoice/export/{id}', [Admin\Bot\PemenangLelangController::class, 'export'])->name('export');
    });
});

// Route::get('/auction', function () {
//     return view('auction',[
//         "title" => "auction"
//     ]);
// });

// Route::get('/auction', function () {
//     return view('auctionlog',[
//         "title" => "auction"
//     ]);
// });

// Route::get('/onelito_store', function () {
//     return view('onelito_store',[
//         "title" => "onelito_store"
//     ]);
// });

// Route::get('/koi_stok', function () {
//     return view('koi_stok',[
//         "title" => "koi_stok"
//     ]);
// });

// Route::get('/koi_stoklog', function () {
//     return view('koi_stoklog',[
//         "title" => "koi_stok"
//     ]);
// });

Route::get('/detail_koistok', function () {
    return view('detail_koistok',[
        "title" => "koi_stok"
    ]);
});

Route::get('/change-password', function () {
    return view('change-password',[
        "title" => "change_password"
    ]);
});

// Route::get('/detail_koichampion', function () {
//     return view('detail_koichampion',[
//         "title" => "koi_stok"
//     ]);
// });

// Route::get('/login', function () {
//     return view('login',[
//         "title" => "login"
//     ]);
// })->name('login');

// Route::get('/registrasi', function () {
//     return view('registrasi',[
//     ]);
// });

// Route::get('/profil', function () {
//     return view('profil',[
//         "title" => ""
//     ]);
// });

// Route::get('/bid', function () {
//     return view('bid',[
//         "title" => "auction"
//     ]);
// });

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

// Route::get('/detail_onelito_store', function () {
//     return view('detail_onelito_store',[
//         "title" => "onelito_store"
//     ]);
// });

// Route::get('/shoppingcart', function () {
//     return view('shoppingcart',[
//         "title" => "Shopping Cart"
//     ]);
// });

// Route::get('/profil2', function () {
//     return view('profil2',[
//         "title" => "Profil"
//     ]);
// });

// Route::get('/wishlist', function () {
//     return view('wishlist',[
//         "title" => "wishlist"
//     ]);
// });

// Route::get('/purchase', function () {
//     return view('purchase',[
//         "title" => "purchase"
//     ]);
// });

Route::get('/transaksi', function () {
    return view('transaksi',[
        "title" => "transaksi"
    ]);
});

Route::get('/transaksiweb', function () {
    return view('transaksiweb',[
        "title" => "transaksiweb"
    ]);
});

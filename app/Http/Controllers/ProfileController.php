<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Event;
use App\Models\EventFish;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        Carbon::setLocale('id');
        $now = Carbon::now();
        $nowAkhir = Carbon::now()->subDay()->endOfDay();

        $currentAuctions = Event::with(['auctionProducts'=> function ($q) {
            $q->with(['maxBid']);
        }])
        ->where('tgl_mulai', '<=', $now)
        ->where('tgl_akhir', '>=', $nowAkhir)
        ->where('status_aktif', 1)
        ->orderBy('tgl_mulai')
        ->orderBy('created_at', 'desc')
        ->get();

        $currentProducts = $currentAuctions->pluck('auctionProducts')
        ->flatten(1);

        $wishlists = [];
        $getWishlist = $auth->wishlists()
        ->with(['wishlistable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo', 'maxBid'],
            ]);
        }])->get();

        $wishEventFish = $getWishlist->whereIn('wishlistable_id', $currentProducts->pluck('id_ikan'));
        $products = $getWishlist->where('wishlistable_type', Wishlist::Product);

        $wishlists = $products->merge($wishEventFish);

        $currentAuctionsFinised = Event::with(['auctionProducts'=> function ($q) {
            $q->with(['maxBid']);
        }])
        ->where('tgl_mulai', '<=', $now)
        ->where('tgl_akhir', '<=', $nowAkhir)
        ->where('status_aktif', 1)
        ->get();

        $currentProductsFinised = $currentAuctionsFinised->pluck('auctionProducts')
        ->flatten(1);

        $fishInCart = Cart::whereIn('cartable_id', $currentProductsFinised->pluck('id_ikan'))
            ->where('cartable_type', Cart::EventFish)
            ->get()
            ->mapWithKeys(fn($q)=>[$q->cartable_id => $q]);

        foreach ($currentProductsFinised as $cProduct) {
            if ($cProduct->maxBid === null) {
                continue;
            }

            if ($cProduct->maxBid->id_peserta !== $auth->id_peserta) {
                continue;
            }

            $dateDiff = Carbon::parse($now, 'id')->diffInMinutes($cProduct->maxBid->updated_at);

            if ($dateDiff < $cProduct->extra_time || array_key_exists($cProduct->id_ikan, $fishInCart->toArray())) {
                continue;
            }

            $dataCart['status_aktif'] = 1;

            $dataCart['id_peserta'] = $auth->id_peserta;
            $dataCart['cartable_id'] = $cProduct->id_ikan;
            $dataCart['jumlah'] = 1;
            $dataCart['cartable_type'] = Cart::EventFish;

            Cart::create($dataCart);
        }

        $carts = $auth->carts()
        ->with(['cartable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo'],
            ]);
        }])
        ->where('status_aktif', 1)
        ->get();

        $cartFishes = $carts->where('cartable_type', Cart::EventFish);

        if ($cartFishes->count() > 0) {
            $biddings = $auth->biddings()->whereIn('id_ikan_lelang', $cartFishes->pluck('cartable_id'))->get()
            ->mapWithKeys(fn($q) => [$q['id_ikan_lelang']  => $q]);

            foreach ($carts as $cart) {
                if (!array_key_exists($cart->cartable_id, $biddings->toArray())) {
                    continue;
                }

                $cart->price = $biddings[$cart->cartable_id]->nominal_bid;
            }
        }

        return view('profil',[
            'auth' => $auth,
            'title' => 'profil',
            'wishlists' => $wishlists,
            'carts' => $carts,
        ]);
    }

    public function shopcart()
    {
        $auth = Auth::guard('member')->user();

        Carbon::setLocale('id');
        $now = Carbon::now();
        $nowAkhir = Carbon::now()->subDay()->endOfDay();

        $currentAuctions = Event::with(['auctionProducts'=> function ($q) {
            $q->with(['maxBid']);
        }])
        ->where('tgl_mulai', '<=', $now)
        ->where('tgl_akhir', '>=', $nowAkhir)
        ->where('status_aktif', 1)
        ->orderBy('tgl_mulai')
        ->orderBy('created_at', 'desc')
        ->get();

        $currentProducts = $currentAuctions->pluck('auctionProducts')
        ->flatten(1);

        $wishlists = [];
        $getWishlist = $auth->wishlists()
        ->with(['wishlistable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo', 'maxBid'],
            ]);
        }])->get();

        $wishEventFish = $getWishlist->whereIn('wishlistable_id', $currentProducts->pluck('id_ikan'));
        $products = $getWishlist->where('wishlistable_type', Wishlist::Product);

        $wishlists = $products->merge($wishEventFish);

        $currentAuctionsFinised = Event::with(['auctionProducts'=> function ($q) {
            $q->with(['maxBid']);
        }])
        ->where('tgl_mulai', '<=', $now)
        ->where('tgl_akhir', '<=', $nowAkhir)
        ->where('status_aktif', 1)
        ->get();

        $currentProductsFinised = $currentAuctionsFinised->pluck('auctionProducts')
        ->flatten(1);

        $fishInCart = Cart::whereIn('cartable_id', $currentProductsFinised->pluck('id_ikan'))
            ->where('cartable_type', Cart::EventFish)
            ->get()
            ->mapWithKeys(fn($q)=>[$q->cartable_id => $q]);

        foreach ($currentProductsFinised as $cProduct) {
            if ($cProduct->maxBid === null) {
                continue;
            }

            if ($cProduct->maxBid->id_peserta !== $auth->id_peserta) {
                continue;
            }

            $dateDiff = Carbon::parse($now, 'id')->diffInMinutes($cProduct->maxBid->updated_at);

            if ($dateDiff < $cProduct->extra_time || array_key_exists($cProduct->id_ikan, $fishInCart->toArray())) {
                continue;
            }

            $dataCart['status_aktif'] = 1;

            $dataCart['id_peserta'] = $auth->id_peserta;
            $dataCart['cartable_id'] = $cProduct->id_ikan;
            $dataCart['jumlah'] = 1;
            $dataCart['cartable_type'] = Cart::EventFish;

            Cart::create($dataCart);
        }

        $carts = $auth->carts()
        ->with(['cartable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo'],
            ]);
        }])
        ->where('status_aktif', 1)
        ->get();

        $cartFishes = $carts->where('cartable_type', Cart::EventFish);

        if ($cartFishes->count() > 0) {
            $biddings = $auth->biddings()->whereIn('id_ikan_lelang', $cartFishes->pluck('cartable_id'))->get()
            ->mapWithKeys(fn($q) => [$q['id_ikan_lelang']  => $q]);

            foreach ($carts as $cart) {
                if (!array_key_exists($cart->cartable_id, $biddings->toArray())) {
                    continue;
                }

                $cart->price = $biddings[$cart->cartable_id]->nominal_bid;
            }
        }

        return view('shoppingcart',[
            'auth' => $auth,
            'title' => 'Shopping Cart',
            'carts' => $carts,
            'wishlists' => $wishlists,
        ]);
    }

    public function wishlist()
    {
        $auth = Auth::guard('member')->user();

        $now = Carbon::now();
        $nowAkhir = Carbon::now()->subDay()->endOfDay();

        $currentAuctions = Event::with(['auctionProducts'])
            ->where('tgl_mulai', '<=', $now)
            ->where('tgl_akhir', '>=', $nowAkhir)
            ->where('status_aktif', 1)
            ->orderBy('tgl_mulai')
            ->orderBy('created_at', 'desc')
            ->get();

        $currentProducts = $currentAuctions->pluck('auctionProducts')
        ->flatten(1);

        $wishlists = [];
        $getWishlist = $auth->wishlists()
        ->with(['wishlistable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo', 'maxBid'],
            ]);
        }])->get();

        $wishEventFish = $getWishlist->whereIn('wishlistable_id', $currentProducts->pluck('id_ikan'));
        $products = $getWishlist->where('wishlistable_type', Wishlist::Product);

        $wishlists = $products->merge($wishEventFish);

        $carts = $auth->carts()
        ->with(['cartable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo'],
            ]);
        }])->get();

        $cartFishes = $carts->where('cartable_type', Cart::EventFish);

        if ($cartFishes->count() > 0) {
            $biddings = $auth->biddings()->whereIn('id_ikan_lelang', $cartFishes->pluck('cartable_id'))->get()
            ->mapWithKeys(fn($q) => [$q['id_ikan_lelang']  => $q]);

            foreach ($carts as $cart) {
                if (!array_key_exists($cart->cartable_id, $biddings->toArray())) {
                    continue;
                }

                $cart->price = $biddings[$cart->cartable_id]->nominal_bid;
            }
        }

        return view('wishlist',[
            'auth' => $auth,
            'title' => 'wishlist',
            'carts' => $carts,
            'wishlists' => $wishlists,
        ]);
    }

    public function purchase()
    {
        $auth = Auth::guard('member')->user();

        $now = Carbon::now();
        $nowAkhir = Carbon::now()->subDay()->endOfDay();

        $currentAuctions = Event::with(['auctionProducts'])
            ->where('tgl_mulai', '<=', $now)
            ->where('tgl_akhir', '>=', $nowAkhir)
            ->where('status_aktif', 1)
            ->orderBy('tgl_mulai')
            ->orderBy('created_at', 'desc')
            ->get();

        $currentProducts = $currentAuctions->pluck('auctionProducts')
        ->flatten(1);

        $wishlists = [];
        $getWishlist = $auth->wishlists()
        ->with(['wishlistable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo', 'maxBid'],
            ]);
        }])->get();

        $wishEventFish = $getWishlist->whereIn('wishlistable_id', $currentProducts->pluck('id_ikan'));
        $products = $getWishlist->where('wishlistable_type', Wishlist::Product);

        $wishlists = $products->merge($wishEventFish);

        $carts = $auth->carts()
        ->with(['cartable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo'],
            ]);
        }])->get();

        $cartFishes = $carts->where('cartable_type', Cart::EventFish);

        if ($cartFishes->count() > 0) {
            $biddings = $auth->biddings()->whereIn('id_ikan_lelang', $cartFishes->pluck('cartable_id'))->get()
            ->mapWithKeys(fn($q) => [$q['id_ikan_lelang']  => $q]);

            foreach ($carts as $cart) {
                if (!array_key_exists($cart->cartable_id, $biddings->toArray())) {
                    continue;
                }

                $cart->price = $biddings[$cart->cartable_id]->nominal_bid;
            }
        }

        return view('purchase',[
            'auth' => $auth,
            'title' => 'purchase',
            'carts' => $carts,
            'wishlists' => $wishlists,
        ]);
    }
}

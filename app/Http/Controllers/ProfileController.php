<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\EventFish;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        $wishlists = $auth->wishlists()
        ->with(['wishlistable' => function (MorphTo $morphTo) {
            $morphTo->morphWith([
                Product::class => ['photo'],
                EventFish::class => ['photo', 'maxBid'],
            ]);
        }])->get();

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

        return view('profil',[
            'auth' => $auth,
            'title' => 'profil',
            'wishlists' => $wishlists,
            'carts' => $carts,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store()
    {
        $data = $this->request->only(['id_produk', 'id_ikan_lelang']);

        $auth = Auth::guard('member')->user();

        if ($this->request->has('id_produk')) {
            $data['wishlistable_id'] = $data['id_produk'];
            $data['wishlistable_type'] = Wishlist::Product;
            unset($data['id_produk']);
        }

        if ($this->request->has('id_ikan_lelang')) {
            $data['wishlistable_id'] = $data['id_ikan_lelang'];
            $data['wishlistable_type'] = Wishlist::EventFish;
            unset($data['id_ikan_lelang']);
        }

        $data['id_peserta'] = $auth->id_peserta;

        $data['create_by'] = Auth::guard('admin')->id();
        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 1;

        $createWishlist = Wishlist::create($data);

        if($createWishlist){
            return response()->json([
                'success' => true,
                'message' => 'Sukses Menambahkan Wishlist',

            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menambahkan Wishlist'
            ],500);
        }
    }


    public function destroy($id)
    {
        $data = $this->request->only(['id_produk', 'id_ikan_lelang']);

        if ($this->request->has('id_produk')) {
            $id = $data['id_produk'];
            $type = Wishlist::Product;
        }

        if ($this->request->has('id_ikan_lelang')) {
            $id = $data['id_ikan_lelang'];
            $type = Wishlist::EventFish;
        }

        $auth = Auth::guard('member')->user();
        $wishlist = Wishlist::where('wishlistable_id', $id)
            ->where('wishlistable_type', $type)
            ->where('id_peserta', $auth->id_peserta);
        $wishlist->delete();

        return response()->json([
            'success' => true,
        ],200);
    }

    public function wishlistlog()
    {
        $auth = Auth::guard('member')->user();

        Carbon::setLocale('id');

        $now = Carbon::now();
        $nowAkhir = Carbon::now()->subDays(3)->endOfDay();

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
                EventFish::class => ['photo', 'maxBid', 'event'],
            ]);
        }])
        ->get();

        $wishEventFish = $getWishlist->whereIn('wishlistable_id', $currentProducts->pluck('id_ikan'));

        if (count($wishEventFish) > 0) {
            foreach ($wishEventFish as $product) {
                $product->wishlistable->tgl_akhir_extra_time = Carbon::createFromDate($product->wishlistable->event->tgl_akhir)
                    ->addMinutes($product->wishlistable->extra_time ?? 0)->toDateTimeString();

                if ($product->wishlistable->maxBid !== null && $product->wishlistable->maxBid->updated_at >= $product->wishlistable->event->tgl_akhir) {
                    $product->wishlistable->tgl_akhir_extra_time = Carbon::createFromDate($product->wishlistable->maxBid->updated_at)
                        ->addMinutes($product->wishlistable->extra_time ?? 0)->toDateTimeString();
                }
            }
        }

        $products = $getWishlist->where('wishlistable_type', Wishlist::Product);


        $wishlists = $products->merge($wishEventFish);

        $now = Carbon::now();

        return view('wishlistlog',[
            'auth' => $auth,
            'title' => 'wishlistlog',
            'wishlists' => $wishlists,
            'now' => $now,
        ]);
    }
}

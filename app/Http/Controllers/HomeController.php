<?php

namespace App\Http\Controllers;

use App\Models\ChampionFish;
use App\Models\Event;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $nowAkhir = Carbon::now()->subDay()->endOfDay();

        $auth = Auth::guard('member')->user();

        $nextAuction = Event::with('auctionProducts.photo')
            ->where('tgl_mulai', '<=', $now)
            ->where('tgl_akhir', '>=', $nowAkhir)
            ->where('status_aktif', 1)
            ->orderBy('tgl_mulai')
            ->get();

        $hotProductStores = Product::where('status_aktif', 1)
            ->when($auth !== null, function ($q) use ($auth){
                return $q->with([
                    'category',
                    'photo',
                    'wishlist' => fn($w) => $w->where('id_peserta', $auth->id_peserta)]
                );
            }, function ($q) {
                return $q->with(['category', 'photo']);
            })
            ->withCount('orderDetails')
            ->has('orderDetails', '>=', 1)
            ->orderByRaw('order_details_count desc')
            ->paginate(5);

        $championFishes = ChampionFish::where('status_aktif', 1)
            ->orderByRaw('created_at desc')
            ->paginate(4);

        return view('home',[
            "title" => "home",
            'nextAuction' => $nextAuction,
            'hotProductStores' => $hotProductStores,
            'championFishes' => $championFishes,
        ]);
    }
}

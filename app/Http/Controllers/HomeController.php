<?php

namespace App\Http\Controllers;

use App\Models\ChampionFish;
use App\Models\Event;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');

        $nextAuction = Event::with('auctionProducts.photo')->where('tgl_akhir', '>=', $now)
            ->where('kategori_event', Event::EVENT)
            ->where('tgl_mulai', '>', $now)
            ->where('status_aktif', 1)
            ->orderBy('tgl_mulai')
            ->first();

        $hotProductStores = Product::where('status_aktif', 1)
            ->with(['category', 'photo'])
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

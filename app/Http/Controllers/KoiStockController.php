<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventFish;
use App\Models\KoiStock;
use App\Models\LogBid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoiStockController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        $fishes = KoiStock::
            where('status_aktif', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage());

        return view('koi_stok',[
            'auth' => $auth,
            'fishes' => $fishes,
            'title' => 'koi_stok'
        ]);
    }
}

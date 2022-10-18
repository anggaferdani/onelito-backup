<?php

namespace App\Http\Controllers;

use App\Models\EventFish;
use App\Models\LogBid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        return view('auction',[
            'auth' => $auth,
            'title' => 'ONELITO KOI'
        ]);
    }

    public function bid($idIkan)
    {
        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();

        $maxBid = LogBid::where('id_ikan_lelang', $idIkan)->orderBy('nominal_bid', 'desc')->first()->nominal_bid ?? 0;

        if ($logBid) {
            $nominalBid = $logBid->nominal_bid;
            $maxBid = $nominalBid > $maxBid ? $nominalBid : $maxBid;
        }

        return view('bid',[
            'auth' => $auth,
            'logBid' => $logBid,
            'maxBid' => $maxBid,
            'idIkan' => $idIkan,
            'auctionProduct' => $auctionProduct,
            'title' => 'ONELITO KOI'
        ]);
    }

    public function bidProcess($idIkan)
    {
        $nominalBid = $this->request->input('nominal_bid', null);

        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $modKb = $nominalBid % $auctionProduct->kb === 0;

        $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();

        return redirect("/auction/$idIkan");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

        $now = Carbon::now()->format('Y-m-d');

        $currentAuction = Event::with([
            'auctionProducts' => function ($q) {
                $q->withCount('bids')->with(['photo', 'maxBid']);
            }
            ])
            ->where('tgl_mulai', '<=', $now)
            ->where('tgl_akhir', '>=', $now)
            ->where('kategori_event', Event::REGULAR)
            ->where('status_aktif', 1)
            ->orderBy('tgl_mulai')
            ->orderBy('created_at', 'desc')
            ->first();

        return view('auction',[
            'auth' => $auth,
            'currentAuction' => $currentAuction,
            'title' => 'ONELITO KOI'
        ]);
    }

    public function bid($idIkan)
    {
        $reqMaxBid = $this->request->input('request.max_bid', 0);

        if ($this->request->ajax()) {

        }

        if ($reqMaxBid === 1) {

        }

        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();

        $maxBid = LogBid::where('id_ikan_lelang', $idIkan)->orderBy('nominal_bid', 'desc')->first()->nominal_bid ?? 0;

        $autoBid = 0;

        if ($logBid) {
            $nominalBid = $logBid->nominal_bid;
            $maxBid = $nominalBid > $maxBid ? $nominalBid : $maxBid;
            $autoBid = $logBid->auto_bid;
        }

        return view('bid',[
            'auth' => $auth,
            'logBid' => $logBid,
            'autoBid' => $autoBid,
            'maxBid' => $maxBid,
            'idIkan' => $idIkan,
            'auctionProduct' => $auctionProduct,
            'title' => 'ONELITO KOI'
        ]);
    }

    public function bidProcess($idIkan)
    {
        $nominalBid = $this->request->input('nominal_bid', null);
        $autoBid = $this->request->input('auto_bid', null);

        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $modKb = $nominalBid % $auctionProduct->kb === 0;

        if (!$modKb) {
            return response()->json(['message' => 'Nominal bid harus sesuai dengan kelipatan bid', 400]);
        }

        $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();

        if ($logBid !== null) {
            $logBid->nominal_bid = $nominalBid;

            $logBid->save();

            return response()->json(['message' => 'success']);
        }

        $createBid = LogBid::create([
            'id_ikan_lelang' => $idIkan,
            'id_peserta' => $auth->id_peserta,
            'nominal_bid' => $nominalBid,
            'auto_bid' => $autoBid,
            'waktu_bid' => Carbon::now(),
            'status_aktif' => 1,
        ]);

        if ($createBid) {
            return response()->json(['message' => 'success']);
        }

        return response()->json(['message' => 'error', 500]);
    }

    public function detail($idIkan)
    {
        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();

        $maxBid = LogBid::where('id_ikan_lelang', $idIkan)->orderBy('nominal_bid', 'desc')->first()->nominal_bid ?? 0;

        $autoBid = 0;

        if ($logBid) {
            $nominalBid = $logBid->nominal_bid;
            $maxBid = $nominalBid > $maxBid ? $nominalBid : $maxBid;
            $autoBid = $logBid->auto_bid;
        }

        return view('detail',[
            'auth' => $auth,
            'logBid' => $logBid,
            'autoBid' => $autoBid,
            'maxBid' => $maxBid,
            'idIkan' => $idIkan,
            'auctionProduct' => $auctionProduct,
            'title' => 'ONELITO KOI'
        ]);
    }

    private function getCurrentMaxBid($idIkan)
    {

    }
}

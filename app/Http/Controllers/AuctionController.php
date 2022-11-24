<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventFish;
use App\Models\LogBid;
use App\Models\LogBidDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        $now = Carbon::now();

        $currentAuctions = Event::with([
            'auctionProducts' => function ($q) {
                $q->withCount('bids')->with(['photo', 'maxBid', 'event']);
            }
            ])
            ->where('tgl_mulai', '<=', $now)
            ->where('tgl_akhir', '>=', $now)
            ->where('status_aktif', 1)
            ->orderBy('tgl_mulai')
            ->orderBy('created_at', 'desc')
            ->get();

        $currentProducts = $currentAuctions->pluck('auctionProducts')
        ->flatten(1);

        $currentAuction = null;

        if (count($currentProducts) > 1) {
            foreach ($currentProducts as $product) {
                $product->tgl_akhir_extra_time = Carbon::createFromDate($product->event->tgl_akhir)
                    ->addMinutes($product->extra_time ?? 0)->toDateTimeString();

            }

            $currentAuction = $currentAuctions->first();
        }

        Carbon::setLocale('id');

        $now = Carbon::now();

        return view('auction',[
            'auth' => $auth,
            'currentAuction' => $currentAuction,
            'auctionProducts' => $currentProducts,
            'now' => $now,
            'title' => 'auction'
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

        $logBid = null;

        if ($auth) {
            $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();
        }

        $maxBid = LogBid::where('id_ikan_lelang', $idIkan)->orderBy('nominal_bid', 'desc')->first()->nominal_bid ?? $auctionProduct->ob;

        $autoBid = 0;

        if ($logBid) {
            $nominalBid = $logBid->nominal_bid ?? 0;
            $maxBid = $nominalBid > $maxBid ? $nominalBid : $maxBid;
            $autoBid = $logBid->auto_bid;
        }

        Carbon::setLocale('id');

        $now = Carbon::now();
        $addedExtraTime = Carbon::createFromDate($auctionProduct->event->tgl_akhir)
            ->addMinutes($auctionProduct->extra_time ?? 0);

        return view('bid',[
            'auth' => $auth,
            'logBid' => $logBid,
            'autoBid' => (int) $autoBid,
            'maxBid' => (int) $maxBid,
            'idIkan' => $idIkan,
            'now' => $now,
            'auctionProduct' => $auctionProduct,
            'title' => 'auction',
            'addedExtraTime' => $addedExtraTime,
        ]);
    }

    public function bidProcess($idIkan)
    {
        $nominalBid = $this->request->input('nominal_bid', null);
        $nominalBidDetail = $this->request->input('nominal_bid_detail', null);
        $autoBid = $this->request->input('auto_bid', null);

        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $modKb = $nominalBidDetail % $auctionProduct->kb === 0;

        if ($autoBid !== null) {
            $modAutoKb = $autoBid % $auctionProduct->kb === 0;
            if (!$modAutoKb) {
                return response()->json(['message' => 'Nominal auto bid harus sesuai dengan kelipatan bid'], 400);
            }
        }

        if (!$modKb && $autoBid === null) {
            return response()->json(['message' => 'Nominal bid harus sesuai dengan kelipatan bid'], 400);
        }

        $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();

        if ($logBid !== null) {
            $nominalBidDetail = (int) $nominalBid - (int) $logBid->nominal_bid;

            if ($autoBid <= $logBid->nominal_bid && $autoBid !== null) {
                return response()->json(['message' => 'success updated']);
            }

            $logBid->nominal_bid = $nominalBid;

            if ($autoBid !== null) {
                $logBid->auto_bid = $autoBid;
            }

            $logBid->save();

            LogBidDetail::create([
                'id_bidding' => $logBid->id_bidding,
                'nominal_bid' => $auctionProduct->kb,
                'status_aktif' => 1,
            ]);

            return response()->json(['message' => 'success updated']);
        }

        $createBid = LogBid::create([
            'id_ikan_lelang' => $idIkan,
            'id_peserta' => $auth->id_peserta,
            'nominal_bid' => $nominalBid,
            'auto_bid' => $autoBid,
            'waktu_bid' => Carbon::now(),
            'status_aktif' => 1,
        ]);

        LogBidDetail::create([
            'id_bidding' => $createBid->id_bidding,
            'nominal_bid' => $nominalBid,
            'status_aktif' => 1,
        ]);

        if ($createBid) {
            return response()->json(['message' => 'success created']);
        }

        return response()->json(['message' => 'error', 500]);
    }

    public function detail($idIkan)
    {
        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $logBid = null;
        if ($auth) {
            $logBid = LogBid::where('id_peserta', $auth->id_peserta)->where('id_ikan_lelang', $idIkan)->first();
        }

        $logBids = LogBid::with('member')->where('id_ikan_lelang', $idIkan)->orderBy('nominal_bid', 'desc')->limit(10)->get();
        $maxBidData = $logBids->first();

        $maxBid = $maxBidData->nominal_bid ?? $auctionProduct->ob;

        $autoBid = 0;

        $meMaxBid = false;

        if ($logBid) {
            $nominalBid = $logBid->nominal_bid;
            $maxBid = $nominalBid > $maxBid ? $nominalBid : $maxBid;
            $autoBid = $logBid->auto_bid;

            if ($maxBidData->id_bidding === $logBid->id_bidding) {
                $meMaxBid = true;
            }
        }

        if ($this->request->ajax()) {
            return response()->json([
                'logBid' => $logBid,
                'autoBid' => $autoBid,
                'maxBid' => $maxBid,
                'idIkan' => $idIkan,
                'meMaxBid' => $meMaxBid,
                'logBids' => $logBids,
                'auctionProduct' => $auctionProduct,
            ]);
        }

        return view('detail',[
            'auth' => $auth,
            'logBid' => $logBid,
            'autoBid' => $autoBid,
            'maxBid' => $maxBid,
            'idIkan' => $idIkan,
            'meMaxBid' => $meMaxBid,
            'auctionProduct' => $auctionProduct,
            'title' => 'ONELITO KOI'
        ]);
    }
}

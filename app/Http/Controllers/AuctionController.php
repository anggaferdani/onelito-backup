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
        $nowAkhir = Carbon::now()->subDay()->endOfDay();

        $currentAuctions = Event::
            when($auth !== null, function ($q) use ($auth){
                $q->with([
                    'auctionProducts' => function ($q) {
                        $q->withCount('bidDetails')->with(['photo', 'maxBid', 'event']);
                    },
                    'auctionProducts.wishlist' => fn($w) => $w->where('id_peserta', $auth->id_peserta)
                ]);
            }, function ($q) {
                $q->with([
                    'auctionProducts' => function ($q) {
                        $q->withCount('bidDetails')->with(['photo', 'maxBid', 'event']);
                    },
                ]);
            })
            ->where('tgl_mulai', '<=', $now)
            ->where('tgl_akhir', '>=', $nowAkhir)
            ->where('status_aktif', 1)
            ->orderBy('tgl_mulai')
            ->orderBy('created_at', 'desc')
            ->get();

        $currentProducts = $currentAuctions->pluck('auctionProducts')
        ->flatten(1);

        $currentAuction = null;
        $currentTotalBid = 0;
        if (count($currentProducts) > 0) {

            foreach ($currentProducts as $product) {
                $currentTotalBid += $product->maxBid->nominal_bid ?? 0;

                $product->tgl_akhir_extra_time = Carbon::createFromDate($product->event->tgl_akhir)
                    ->addMinutes($product->extra_time ?? 0)->toDateTimeString();

                if ($product->maxBid !== null && $product->maxBid->updated_at >= $product->event->tgl_akhir) {
                    $product->tgl_akhir_extra_time = Carbon::createFromDate($product->maxBid->updated_at)
                        ->addMinutes($product->extra_time ?? 0)->toDateTimeString();
                }
            }

            $currentAuction = $currentAuctions->first();
        }

        Carbon::setLocale('id');

        $now = Carbon::now();

        return view('auction',[
            'auth' => $auth,
            'currentAuction' => $currentAuction ,
            'auctionProducts' => $currentProducts,
            'now' => $now,
            'currentTotalBid' => $currentTotalBid,
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

        $maxBidData = LogBidDetail::whereHas('logBid', function($q) use ($idIkan){
            $q->where('id_ikan_lelang', $idIkan);
        })
        ->with('logBid')
        ->orderBy('nominal_bid', 'desc')->first();

        Carbon::setLocale('id');

        $addedExtraTime = Carbon::createFromDate($auctionProduct->event->tgl_akhir)
            ->addMinutes($auctionProduct->extra_time ?? 0)
            ->format('d M Y H:i:s');

        if ($maxBidData !== null && $maxBidData->logBid->updated_at >= $auctionProduct->event->tgl_akhir) {
            $addedExtraTime = Carbon::createFromDate($maxBidData->logBid->updated_at)
                ->addMinutes($auctionProduct->extra_time ?? 0)
                ->format('d M Y H:i:s');
        }

        $now = Carbon::now()->format('d M Y H:i:s');

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
            'maxBidData' => $maxBidData,
            'currentPrice' => $maxBid,
        ]);
    }

    public function bidProcess($idIkan)
    {
        $nominalBid = $this->request->input('nominal_bid', null);
        $nominalBidDetail = $this->request->input('nominal_bid_detail', null);
        $autoBid = $this->request->input('auto_bid', null);

        $auth = Auth::guard('member')->user();

        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($idIkan);

        $modKb = ($nominalBidDetail + $auctionProduct->ob) % $auctionProduct->kb === 0;

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
                'nominal_bid' => $logBid->nominal_bid,
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
            'nominal_bid' => $createBid->nominal_bid,
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

        $logBids = LogBidDetail::with('logBid.member')
        ->selectRaw('t_log_bidding_detail.*, DATE_FORMAT(created_at, "%e %b %H:%i:%s") as bid_time')
        ->whereHas('logBid', function($q) use ($idIkan){
            $q->where('id_ikan_lelang', $idIkan);
        })->orderBy('nominal_bid', 'desc')->limit(10)->get();


        $maxBidData = $logBids->first();

        $maxBid = $maxBidData->nominal_bid ?? $auctionProduct->ob;

        $autoBid = 0;

        $meMaxBid = false;

        if ($logBid) {
            $nominalBid = $logBid->nominal_bid;
            $maxBid = $nominalBid > $maxBid ? $nominalBid : $maxBid;
            $autoBid = $logBid->auto_bid;

            if ($maxBidData->id_bidding === $logBid->id_bidding
            && $maxBidData->id_bidding === $logBid->id_bidding) {
                $meMaxBid = true;
            }
        }

        if ($this->request->ajax()) {

            $addedExtraTime = Carbon::createFromDate($maxBidData->created_at)
                ->addMinutes($auctionProduct->extra_time ?? 0);

            return response()->json([
                'logBid' => $logBid,
                'autoBid' => $autoBid,
                'maxBid' => $maxBid,
                'idIkan' => $idIkan,
                'meMaxBid' => $meMaxBid,
                'logBids' => $logBids,
                'maxBidData' => $maxBidData,
                'auctionProduct' => $auctionProduct,
                'addedExtraTime' => $addedExtraTime,
            ]);
        }

        return view('detail',[
            'auth' => $auth,
            'logBid' => $logBid,
            'autoBid' => $autoBid,
            'maxBid' => $maxBid,
            'idIkan' => $idIkan,
            'meMaxBid' => $meMaxBid,
            'maxBidData' => $maxBidData,
            'auctionProduct' => $auctionProduct,
            'title' => 'ONELITO KOI'
        ]);
    }

    public function bidNow($idIkan)
    {
        return redirect("/auction/$idIkan");
    }
}

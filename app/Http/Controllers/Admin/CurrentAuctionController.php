<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventFish;
use App\Models\LogBid;
use App\Models\LogBidDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CurrentAuctionController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        if ($this->request->ajax()) {
            $now = Carbon::now();
            $nowAkhir = Carbon::now()->subDays(3)->endOfDay();

            $currentAuctions = Event::with([
                    'auctionProducts' => function ($q) {
                        $q->withCount('bidDetails')->with(['photo', 'maxBid']);
                    },
                ])
                ->where('tgl_mulai', '<=', $now)
                ->where('tgl_akhir', '>=', $nowAkhir)
                ->where('status_aktif', 1)
                ->orderBy('tgl_mulai')
                ->orderBy('created_at', 'desc')
                ->get();

            $currentProducts = $currentAuctions->pluck('auctionProducts')
            ->flatten(1);

            return DataTables::of($currentProducts)
            ->addIndexColumn()
            ->editColumn('photo', function ($data) {
                $path = $data->photo->path_foto ?? false;

                if (!$path) {
                    return '';
                }

                return '
                    <img src="'.asset("storage/$path").'" style="
                    width: 80px;
                    height: 80px;
                    object-fit: cover;">
                ';
            })
            ->addColumn('current_price', function ($data) {
                $currentPrice = $data->maxBid ?? false;

                if (!$currentPrice) {
                    return '';
                }

                return number_format( $currentPrice->nominal_bid , 0 , '.' , '.' );
            })
            ->addColumn('action','admin.pages.current-auction.dt-action')
            ->rawColumns(['action', 'photo'])
            ->make(true);
        }

        return view('admin.pages.current-auction.index')->with([
            'type_menu' => 'current-auction',
        ]);
    }

    public function show($id)
    {
        $auctionProduct = EventFish::with(['photo', 'event'])->findOrFail($id);

        $logBids = LogBidDetail::with('logBid.member')
        ->selectRaw('t_log_bidding_detail.*, DATE_FORMAT(created_at, "%e %b %H:%i:%s") as bid_time')
        ->whereHas('logBid', function($q) use ($id){
            $q->where('id_ikan_lelang', $id);
        })
        ->distinct('nominal_bid')
        ->orderBy('nominal_bid', 'desc')
        ->orderBy('updated_at', 'desc')->limit(10)->get();

        if($auctionProduct){
            return response()->json([
                'auction_product' => $auctionProduct,
                'log_bids' => $logBids,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Not Found'
            ],404);
        }
    }

    public function update($idLogBid)
    {
        $detail = LogBidDetail::findOrFail($idLogBid);

        try {
            DB::transaction(function () use ($detail, $idLogBid){
                $lastDetail = LogBidDetail::where('id_bidding', $detail->id_bidding)
                    ->where('id_bidding_detail', '!=', $idLogBid)
                    ->orderBy('nominal_bid')->first();

                $bid = LogBid::findOrFail($detail->id_bidding);

                if ($lastDetail === null) {
                    $detail->delete();
                    $bid->delete();
                } else {
                    $bid->nominal_bid = $lastDetail->nominal_bid;
                    $bid->save();
                    $detail->delete();
                }
            });

            return response()->json([
                'success' => true,
                'message' => [
                    'title' => 'Berhasil',
                    'content' => 'Mengubah data auction',
                    'type' => 'success'
                ],
            ],200);

        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'error' => $e->getMessage(),
            ],500);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionWinner;
use App\Models\Cart;
use App\Models\Event;
use App\Models\EventFish;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AuctionWinnerController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        $now = Carbon::now();
        $nowAkhir = Carbon::now()->subDay()->endOfDay();

        $auctionProducts = EventFish::
        doesntHave('winners')
        ->with(['bids.member', 'maxBid'])
        ->where('status_aktif', 1)->get()
        ->mapWithKeys(fn($a) => [$a->id_ikan => $a]);

        // $currentAuctionsFinised = Event::with(['auctionProducts'=> function ($q) {
        //     $q->with(['maxBid']);
        // }])
        // ->where('tgl_mulai', '<=', $now)
        // ->whereIn('id_bidding', $auctionProducts->pluck('bids.id_bidding'))
        // ->where('tgl_akhir', '<=', $nowAkhir)
        // ->where('status_aktif', 1)
        // ->get();

        // $currentProductsFinised = $auctionProducts->pluck('auctionProducts')
        // ->flatten(1);


        $fishInWinner = AuctionWinner::whereIn('id_bidding', $auctionProducts->pluck('maxBid.id_bidding'))
            ->get()
            ->mapWithKeys(fn($q)=>[$q->id_bidding => $q]);

        foreach ($auctionProducts as $cProduct) {
            if ($cProduct->maxBid === null) {
                continue;
            }

            $dateDiff = Carbon::parse($now, 'id')->diffInMinutes($cProduct->maxBid->updated_at);

            if ($dateDiff < $cProduct->extra_time || array_key_exists($cProduct->maxBid->id_bidding, $fishInWinner->toArray())) {
                continue;
            }

            $data['id_bidding'] = $cProduct->maxBid->id_bidding;
            $data['create_by'] = Auth::guard('admin')->id();
            $data['update_by'] = Auth::guard('admin')->id();
            $data['status_aktif'] = 1;

            AuctionWinner::create($data);
        }

        if ($this->request->ajax()) {
            $winners = AuctionWinner::query()
                ->with(['bidding.member.city', 'bidding.eventFish'])
                ->where('status_aktif', 1)
                ->orderBy('created_at', 'desc');

            return DataTables::of($winners)
            ->addIndexColumn()
            ->editColumn('bidding.nominal_bid', function ($data) {
                $number = number_format( $data->bidding->nominal_bid , 0 , '.' , '.' );

                return "Rp.$number";
            })
            // ->addColumn('action','admin.pages.auction-winner.dt-action')
            // ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.auction-winner.index')->with([
            'type_menu' => 'manage-auction-winner',
            'auctionProducts' => $auctionProducts,
        ]);
    }

    public function store()
    {
        $data = $this->request->only(['id_bidding']);

        $data['create_by'] = Auth::guard('admin')->id();
        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 1;

        $dataCart['create_by'] = Auth::guard('admin')->id();
        $dataCart['update_by'] = Auth::guard('admin')->id();
        $dataCart['status_aktif'] = 1;

        $createWinner = AuctionWinner::create($data);
        $createWinner->load('bidding');
        $dataCart['id_peserta'] = $createWinner->bidding->id_peserta;
        $dataCart['cartable_id'] = $createWinner->bidding->id_ikan_lelang;
        $dataCart['cartable_type'] = Cart::EventFish;

        Cart::create($dataCart);

        if($createWinner){
            return redirect()->back()->with([
                'success' => true,
                'message' => 'Sukses Menambahkan Pemenang Lelang',

            ],200);
        }else{
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Gagal Menambahkan Pemenang Lelang'
            ],500);
        }
    }

    public function show($id)
    {
        $fish = AuctionWinner::findOrFail($id);

        if($fish){
            return response()->json($fish);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Not Found'
            ],404);
        }
    }

    public function update($id)
    {
        $fish = AuctionWinner::findOrFail($id);
        $data = $this->request->all();
        $validator = Validator::make($this->request->all(), [
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data['update_by'] = Auth::guard('admin')->id();

        $image = $fish->foto_ikan;
        if($this->request->hasFile('path_foto')){
            $image = $this->request->file('path_foto')->store(
                'foto_champion_koi','public'
            );
        }

        try {

            $data['foto_ikan'] = $image;
            unset($data['path_foto']);
            $fish->update($data);

            return response()->json([
                'success' => true,
                'message' => [
                    'title' => 'Berhasil',
                    'content' => 'Mengubah data Pemenang Lelang',
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

    public function destroy($id)
    {
        $fish = AuctionWinner::findOrFail($id);
        $fish->status_aktif = 0;

        $fish->save();

        return response()->json([
            'success' => true,
        ],200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store()
    {
        $auth = Auth::guard('member')->user();

        $dataCart = $this->request->only(['total_price', 'jumlah', 'cartable_id', 'cartable_type']);

        $exists = Cart::where('id_peserta', $auth->id_peserta)
            ->where('cartable_id', $dataCart['cartable_id'])
            ->where('cartable_type', $dataCart['cartable_type'])
            ->first();

        if ($exists !== null) {
            $exists->jumlah = $exists->jumlah + $dataCart['jumlah'];
            $exists->save();

            return response()->json([
                'success' => true,
                'message' => 'Sukses Menambahkan Pemenang Lelang',
            ],200);
        }

        $dataCart['id_peserta'] = $auth->id_peserta;
        $dataCart['create_by'] = Auth::guard('admin')->id();
        $dataCart['update_by'] = Auth::guard('admin')->id();
        $dataCart['status_aktif'] = 1;

        $createCart = Cart::create($dataCart);

        if($createCart){
            return response()->json([
                'success' => true,
                'message' => 'Sukses Menambahkan Pemenang Lelang',
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menambahkan Pemenang Lelang'
            ],500);
        }
    }
}

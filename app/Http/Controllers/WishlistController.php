<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store()
    {
        $data = $this->request->only('id_produk');

        $auth = Auth::guard('member')->user();

        $data['id_peserta'] = $auth->id_peserta;
        $data['create_by'] = Auth::guard('admin')->id();
        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 1;

        $createWishlist = Wishlist::create($data);

        if($createWishlist){
            return response()->json([
                'success' => true,
                'message' => 'Sukses Menambahkan Wishlist',

            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menambahkan Wishlist'
            ],500);
        }
    }


    public function destroy($id)
    {
        $auth = Auth::guard('member')->user();
        $wishlist = Wishlist::where('id_produk', $id)
            ->where('id_peserta', $auth->id_peserta);
        $wishlist->delete();

        return response()->json([
            'success' => true,
        ],200);
    }
}

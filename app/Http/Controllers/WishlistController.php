<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store()
    {
        $data = $this->request->only(['id_produk', 'id_ikan_lelang']);

        $auth = Auth::guard('member')->user();

        if ($this->request->has('id_produk')) {
            $data['wishlistable_id'] = $data['id_produk'];
            $data['wishlistable_type'] = Wishlist::Product;
            unset($data['id_produk']);
        }

        if ($this->request->has('id_ikan_lelang')) {
            $data['wishlistable_id'] = $data['id_ikan_lelang'];
            $data['wishlistable_type'] = Wishlist::EventFish;
            unset($data['id_ikan_lelang']);
        }

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
        $data = $this->request->only(['id_produk', 'id_ikan_lelang']);

        if ($this->request->has('id_produk')) {
            $id = $data['id_produk'];
            $type = Wishlist::Product;
        }

        if ($this->request->has('id_ikan_lelang')) {
            $id = $data['id_ikan_lelang'];
            $type = Wishlist::EventFish;
        }

        $auth = Auth::guard('member')->user();
        $wishlist = Wishlist::where('wishlistable_id', $id)
            ->where('wishlistable_type', $type)
            ->where('id_peserta', $auth->id_peserta);
        $wishlist->delete();

        return response()->json([
            'success' => true,
        ],200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('member')->user();

        $products = Product::
            where('status_aktif', 1)
            ->when($auth !== null, function ($q) use ($auth){
                return $q->with([
                    'category',
                    'photo',
                    'wishlist' => fn($w) => $w->where('id_peserta', $auth->id_peserta)]
                );
            }, function ($q) {
                return $q->with(['category', 'photo']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage());

            // dd($products->previousPageUrl());

        $fishFoodProducts = Product::
            where('status_aktif', 1)
            ->where('id_kategori_produk', 2)
            ->when($auth !== null, function ($q) use ($auth){
                return $q->with([
                    'category',
                    'photo',
                    'wishlist' => fn($w) => $w->where('id_peserta', $auth->id_peserta)]
                );
            }, function ($q) {
                return $q->with(['category', 'photo']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage());

        $fishEquipmentProducts = Product::
            where('status_aktif', 1)
            ->where('id_kategori_produk', 1)
            ->when($auth !== null, function ($q) use ($auth){
                return $q->with([
                    'category',
                    'photo',
                    'wishlist' => fn($w) => $w->where('id_peserta', $auth->id_peserta)]
                );
            }, function ($q) {
                return $q->with(['category', 'photo']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage());

        return view('onelito_store',[
            'auth' => $auth,
            'products' => $products,
            'fishFoodProducts' => $fishFoodProducts,
            'fishEquipmentProducts' => $fishEquipmentProducts,
            'title' => 'ONELITO STORE'
        ]);
    }

    public function detail($id)
    {
        $auth = Auth::guard('member')->user();

        $product = Product::
            with(['category', 'photo'])
            ->findOrFail($id);

        return view('detail_onelito_store',[
            'auth' => $auth,
            'product' => $product,
            'title' => 'ONELITO STORE'
        ]);
    }
}

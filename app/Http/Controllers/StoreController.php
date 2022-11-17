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
            ->with(['category', 'photo'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('onelito_store',[
            'auth' => $auth,
            'products' => $products,
            'title' => 'ONELITO KOI'
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
            'title' => 'ONELITO KOI'
        ]);
    }
}

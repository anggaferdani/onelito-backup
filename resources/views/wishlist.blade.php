@extends('profil')

@section('container')
    <div class="container my-3 text-center">
        <h5><i class="fa-regular fa-heart"></i> <strong>Wishlist</strong></h5>
    </div>
    <h1>{{ count($wishlists) ?? '' }} <span>Barang</span></h1>
    <div class="row">
    @forelse($wishlists as $wishlist)
        @php

            $wishlistPhoto = url('img/uniring.jpeg');
            $wishlistable = $wishlist->wishlistable;

            if ($wishlist->wishlistable_type === 'EventFish') {
                $wishlistPhoto = url('img/koi11.jpg');
                $currentMaxBid = $wishlistable->ob;

                if ($wishlistable->maxBid !== null) {
                    $currentMaxBid = $wishlistable->maxBid->nominal_bid;
                }
            }

            if ($wishlist->wishlistable->photo !== null) {
                $wishlistPhoto = url('storage') . '/' . $wishlist->wishlistable->photo->path_foto;
            }
        @endphp

        @if($wishlist->wishlistable_type === 'EventFish')

        <div class="col-3 border m-3">
            <div class="cart">
                <a href="{{ '/auction-bid-now/' . $wishlistable->id_ikan }}">
                <img src="{{ $wishlistPhoto }}" alt="bio media" class="card-img-top"
                        height="170"></a>
                <p>{!! Illuminate\Support\Str::limit(
                                "$wishlistable->variety | $wishlistable->breeder | $wishlistable->size | $wishlistable->bloodline",
                                45,
                            ) !!}</p>
                <p style="font-size: 10px" class="card-text ma">Harga saat ini</p>
                <p><b>Rp.
                    {{ number_format($currentMaxBid, 0, '.', '.') }}</b></p>
            </div>
        </div>
        @endif
        @if($wishlist->wishlistable_type === 'Product')
            <div class="border col m-3">
                <img src="{{ $wishlistPhoto }}" alt="uniring" class="card-img-top" height="170">
                <p>{{ $wishlist->wishlistable->merek_produk }}
                {{ $wishlist->wishlistable->nama_produk }}</p>
                <p><b>Rp.
                        {{ number_format($wishlist->wishlistable->harga, 0, '.', '.') }}</b>
                </p>
                <button class="mb-3 text-danger " style="background-color: transparent;font-size:small;border-color:red"><i
                        class="fa-solid fa-plus"></i> <span>Keranjang</span></button>
            </div>
        @endif
    @empty
    @endforelse
        <!-- <div class="border col m-3">
            <div class="cart">
                <a href="/detail_onelito_store"><img src="img/bio_media.png" alt="bio media" class="card-img-top"
                        height="170"></a>
                <p>Bio Tube Bacteria House
                    Media Filter</p>
                <p><b>Rp. 1.300.000</b></p>
                <button class="mb-3 text-danger " style="background-color: transparent;font-size:small;border-color:red"><i
                        class="fa-solid fa-plus"></i> <span>Keranjang</span></button>
            </div>
        </div>
        <div class="border col m-3">
            <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
            <p>Uniring rubber hose /
                selang aerasi</p>
            <p><b>Rp. 580.000</b></p>
            <button class="mb-3 text-danger " style="background-color: transparent;font-size:small;border-color:red"><i
                    class="fa-solid fa-plus"></i> <span>Keranjang</span></button>
        </div> -->
    </div>
@endsection

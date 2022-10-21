@extends('profil')

@section('container')
    <div class="container my-3 text-center">
        <h5><i class="fa-regular fa-heart"></i> <strong>Wishlist</strong></h5>
    </div>
    <h1>2 <span>Barang</span></h1>
    <div class="row">
        <div class="border col m-3">
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
        </div>
    </div>
@endsection

@extends('layout.main')

@section('container')
<div class="container">
    <br>
    <a href="/onelito_store"><i class="fa-solid fa-arrow-left-long text-body"></i></a>
    <br><br>
    {{-- <div class="row">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col-4">
               
            </div>
            <div class="col-4 mx-3">
                <p style="font-size: 35px">Bio Tube Bacteria House Media Filter</p>
                <h2>Rp 1.300.000</h2>
                <hr>
                <p class="alert-link text-danger">Detail</p>
                <p>Condition . . . . . . . New</p>
                <p>Unit weight . . . . . . . 15 Kg</p>
                <p>Category . . . . . . . Filter Aquarium</p>
                <p>Etalase . . . . . . . Koi Equipment</p>
                <p>Bio Tube bacteria house merupakan media filter biologis kolam koi maupun aquarium air tawar, bio tube di design khusus sehingga bakteri dapat tumbuh secara maximal untuk mengelola amoniak yang dihasilkan oleh limbah ikan.</p>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Ordered quantity</h5>
                        <div class="row">
                            <div class="col">
                                <h6 class="card-subtitle mb-2 text-muted">Subtotal</h6>
                            </div>
                            <div class="col">
                                <p>Rp 1.300.000</p>
                            </div>
                        </div>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="img/bio_media.png" alt="bio media" class="" style="width: 35rem;">
            </div>
            <div class="col">
                <p style="font-size: 35px">Bio Tube Bacteria House Media Filter</p>
                    <h2>Rp 1.300.000</h2>
                    <hr>
                    <p class="alert-link text-danger">Detail</p>
                    <p>Condition . . . . . . . New</p>
                    <p>Unit weight . . . . . . . 15 Kg</p>
                    <p>Category . . . . . . . Filter Aquarium</p>
                    <p>Etalase . . . . . . . Koi Equipment</p>
                    <p>Bio Tube bacteria house merupakan media filter biologis kolam koi maupun aquarium air tawar, bio tube di design khusus sehingga bakteri dapat tumbuh secara maximal untuk mengelola amoniak yang dihasilkan oleh limbah ikan.</p>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Ordered quantity</h5>

                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-light"><i class="fa-solid fa-minus"></i></button>
                            <button type="button" class="btn btn-light">1</button>
                            <button type="button" class="btn btn-light"><i class="fa-solid fa-plus"></i></button>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h6 class="my-md-2 text-muted">Subtotal</h6>
                            </div>
                            <div class="col">
                                <p>Rp 1.300.000</p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success w-100 justify-content-between mb-xl-2">Order Now</button>
                        <div class="row gx-5">
                            <div class="col">
                                <button type="button" class="btn btn-success w-100 justify-content-between text-success" style="background-color: white">Add Cart</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success w-100 justify-content-between text-success" style="background-color: white">Wishlist</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>


@endsection
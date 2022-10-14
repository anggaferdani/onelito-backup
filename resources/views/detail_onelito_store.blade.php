@extends('layout.main')

@section('container')
<div class="container">
    <br>
    <a href="/onelito_store"><i class="fa-solid fa-arrow-left-long text-body"></i></a>
    <br><br>

    <div class="container">
        <style>

            /* On screens that are 992px or less, set the background color to blue */
            @media screen and (min-width: 601px) {
                .nav-atas {
                    display: none
                }
            }
        
            /* On screens that are 600px or less, set the background color to olive */
            @media screen and (max-width: 600px) {
                .nav-samping {
                    display: none;
                }
            }
        
        </style>
        <div class="nav-atas">
            <div class=>
                <img src="img/bio_media.png" alt="bio media" class="w-100">
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-10">
                            <p>Bio Tube Bacteria House Media Filter</p>
                        </div>
                        <div class="col-2">
                            <i class="far fa-heart m-3" style="font-size:large"></i>
                        </div>
                    </div>
                    
                    <h2>Rp 1.300.000</h2>
                    <hr>
                    <p class="alert-link text-danger">Detail</p>
                    <p>Condition . . . . . . . New</p>
                    <p>Unit weight . . . . . . . 15 Kg</p>
                    <p>Category . . . . . . . Filter Aquarium</p>
                    <p>Etalase . . . . . . . Koi Equipment</p>
                    <p>Bio Tube bacteria house merupakan media filter biologis kolam koi maupun aquarium air tawar, bio tube di design khusus sehingga bakteri dapat tumbuh secara maximal untuk mengelola amoniak yang dihasilkan oleh limbah ikan.</p>
                </div>
                <div>
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
                    <div class="row gx-5 mt-3">
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
        <div class="nav-samping">
            <div class="row">
                <div class="col">
                    <img src="img/bio_media.png" alt="bio media" class="w-100">
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
    </div>
    <br><br>
</div>


@endsection
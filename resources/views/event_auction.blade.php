@extends('layout.mainlog')

@section('container')
    <style>
        .bottom {
            position: absolute;
            bottom: 212px;
            width: 99%;
        }
    </style>

    <div class="container-fluid p-0">
        <img src="img/event.png" class="w-100" alt="...">
        <div class="bottom">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="card">
                        <div class="card-body p-2 text-center">
                            <p class="m-0" style="font-size: small">CURRENT TOTAL BID</p>
                            <h3 class="m-0 text-danger">1.978.007.000</h3>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-body p-2 text-center">
                            <p class="m-0" style="font-size: small">CURRENT TOTAL PRIZE</p>
                            <h3 class="m-0 text-danger">978.007.000</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div>
            <h5>Event Auction</h5>
        </div>

        {{-- <div class="row mb-5">
            <div class="col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">10</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="m-0">Current bid</p>
                                <p class="m-0" style="color: red">Rp. 7.500.00</p>
                            </div>

                            <div class="col-6">
                                <p class="m-0" style="text-align: end;">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/bid" class="btn btn-danger w-100 d-flex justify-content-between">BID NOW
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-md-6">
                                <a href="/detail" class="btn btn-secondary w-100 d-flex justify-content-between">DETAIL
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i
                                        class="fa-solid fa-circle-chevron-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">10</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="m-0">Current bid</p>
                                <p class="m-0" style="color: red">Rp. 7.500.00</p>
                            </div>

                            <div class="col-6">
                                <p class="m-0" style="text-align: end;">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between">BID NOW
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-secondary w-100 d-flex justify-content-between">DETAIL
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i
                                        class="fa-solid fa-circle-chevron-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">10</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="m-0">Current bid</p>
                                <p class="m-0" style="color: red">Rp. 7.500.00</p>
                            </div>

                            <div class="col-6">
                                <p class="m-0" style="text-align: end;">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between">BID NOW
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-secondary w-100 d-flex justify-content-between">DETAIL
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i
                                        class="fa-solid fa-circle-chevron-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">10</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="m-0">Current bid</p>
                                <p class="m-0" style="color: red">Rp. 7.500.00</p>
                            </div>

                            <div class="col-6">
                                <p class="m-0" style="text-align: end;">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-danger w-100 d-flex justify-content-between">BID NOW
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-secondary w-100 d-flex justify-content-between">DETAIL
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i
                                        class="fa-solid fa-circle-chevron-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row mb-5">
            <div class="col-6 col-md-3 mt-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">15</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. 7.500.00</p>
                            </div>

                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="/bid" class="btn btn-danger w-100 d-flex justify-content-between p-1"
                                    style="font-size: 60%">BID NOW <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="/detail" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1"
                                    style="font-size: 60%">DETAIL <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">7</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. 6.500.00</p>
                            </div>

                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="/bid2" class="btn btn-danger w-100 d-flex justify-content-between p-1"
                                    style="font-size: 60%">BID NOW <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="/detail2" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1"
                                    style="font-size: 60%">DETAIL <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">11</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. 5.000.00</p>
                            </div>

                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="/bid3" class="btn btn-danger w-100 d-flex justify-content-between p-1"
                                    style="font-size: 60%">BID NOW <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="/detail3" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1"
                                    style="font-size: 60%">DETAIL <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">8</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. 4.000.00</p>
                            </div>

                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="/bid4" class="btn btn-danger w-100 d-flex justify-content-between p-1"
                                    style="font-size: 60%">BID NOW <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="/detail4" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1"
                                    style="font-size: 60%">DETAIL <span><i
                                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO
                                    <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i
                                        class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection

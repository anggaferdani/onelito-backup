@extends('layout.main')

@section('container')

<div class="container">
    <h5>Rules Auction</h5>
    <p class="m-0">{{ $currentAuction->rules_event ?? "" }}</p>

    <div class="my-5">
        <p style="color: red">{{ $currentAuction->deskripsi_event ?? "" }}</p>
    </div>

    <div class="container-fluid">
        <div>
            <h5>Spesial Auction</h5>
        </div>

        <div class="row mb-5">
        @php
            $auctionProducts = $currentAuction->auctionProducts ?? [];
        @endphp
        @forelse($auctionProducts as $auctionProduct)
                @php
                    $photo = 'img/koi_3.jpg';
                    if ($auctionProduct->photo !== null)
                    {
                        $photo = url('storage') .'/'. $auctionProduct->photo->path_foto;
                    }

                    $currentMaxBid = $auctionProduct->ob;

                    if ($auctionProduct->maxBid !== null) {
                        $currentMaxBid = $auctionProduct->maxBid->nominal_bid;
                    }
                @endphp

            <div class="col-6 col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $auctionProduct->variety }} |   {{ $auctionProduct->breeder }} | Pedigree | {{ $auctionProduct->size }} | {{ $auctionProduct->bloodline }}</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">{{ $auctionProduct->bids_count }}</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. {{ $currentMaxBid }}</p>
                            </div>

                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="{{ '/auction/'. $auctionProduct->id_ikan }}" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 60%">BID NOW <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="{{ '/auction/'. $auctionProduct->id_ikan . '/detail' }}" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1" style="font-size: 60%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a target="_blank" href="{{ $auctionProduct->link_video }}" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i class="far fa-heart"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
            <!-- <div class="col-6 col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">7</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. 6.500.000</p>
                            </div>
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="/login" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 60%">BID NOW <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1" style="font-size: 60%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a href="/login" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i class="far fa-heart"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">11</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. 5.000.000</p>
                            </div>

                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="/login" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 60%">BID NOW <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1" style="font-size: 60%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a href="/login" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i class="far fa-heart"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
                        <p class="m-0">Number of bids</p>
                        <p class="" style="color: red">8</p>
                        <div class="row">
                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="font-size:x-small">Harga saat ini</p>
                                <p class="m-0" style="color: red;font-size:75%">Rp. 4.000.000</p>
                            </div>

                            <div class="col-6 p-0 px-lg-2">
                                <p class="m-0" style="text-align: end;font-size: x-small">Countdown</p>
                                <p class="m-0" style="text-align: end;color :red;font-size:75%;">00:35:45</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 p-0 px-sm-2">
                                <a href="/login" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 60%">BID NOW <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-6 col-md-6 pe-0 px-sm-2">
                                <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1" style="font-size: 60%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-9 p-0">
                                <a href="/login" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                            </div>
                            <div class="col-3 p-0 px-sm-4">
                                <button class="border-0 m-1" style="background-color: transparent;font-size:larger"><i class="far fa-heart"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>



@endsection

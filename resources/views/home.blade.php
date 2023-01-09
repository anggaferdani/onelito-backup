@extends('layout.main')

@section('container')
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

        .cb-judul {
            height: 5rem;

        }

        .cb-judu {
            height: 3.5rem;
        }

        .cb-jud {
            height: 2.5rem;
        }

        body a {
            text-decoration: none
        }
    </style>

    <br><br><br><br>
    <div id="carouselExampleControls" class="pt-2 carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner img-mh-300">
            <div class="carousel-item active">
                <div class="container-fluit" style="background-color:red;">
                    <img src="img/Frame.png" class="d-block w-100" alt="Frame">
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-fluit" style="background-color:red;">
                    <img src="img/Frame.png" class="d-block w-100" alt="Frame">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-3 mt-lg mt-lg-5">
        {{-- <h5><b>Auction</b></h5> --}}

        {{-- <img src="{{ url('img/nolelang.png') }}" class="d-block w-100" alt="ceklis"> --}}
        <!-- <img src="{{ url('img/nolelang.png') }}" class="d-block w-100 mt-5" alt="ceklis"> -->
    </div>

    <div class="container nav-atas">
        <div class="row">
            @forelse($auctionProducts as $auctionProduct)
                @php
                    $photo = 'img/koi11.jpg';
                    if ($auctionProduct->photo !== null) {
                        $photo = url('storage') . '/' . $auctionProduct->photo->path_foto;
                    }

                    $currentMaxBid = $auctionProduct->ob;

                    if ($auctionProduct->maxBid !== null) {
                        $currentMaxBid = $auctionProduct->maxBid->nominal_bid;
                    }
                @endphp
                <div class="col-6 col-lg-3 mt-3">
                    <div class="card">
                        <a class="text-dark" href="/auction">
                            <img src="{{ $photo }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="cb-jud">
                                    <h5 class="card-title">{!! Illuminate\Support\Str::limit(
                                        "$auctionProduct->variety | $auctionProduct->breeder | $auctionProduct->size | $auctionProduct->bloodline",
                                        45,
                                    ) !!}</h5>
                                </div>
                                {{-- <p style="font-size: 10px" class="card-text ma">Starting Price</p>
                                <p style="color :red;font-size: 12px" class="m-0">Rp.
                                    {{ number_format($auctionProduct->ob, 0, '.', '.') }}</p> --}}
                                <p class="m-0">Number of bids</p>
                                <p class="" style="color: red">{{ $auctionProduct->bid_details_count }}</p>
                                <div class="row">
                                    <div class="col-6 p-0 px-lg-2">
                                        <p class="m-0" style="font-size:80%">Harga saat ini</p>
                                        <p class="m-0" style="color: red;font-size:75%">Rp {{ number_format($currentMaxBid, 0, '.', '.') }}</p>
                                    </div>
                                    <div class="col-6 p-0 px-lg-2">
                                        <p class="m-0" style="text-align: end;font-size:80%">Live Time</p>
                                        <p class="m-0 countdown-label" id="atas-{{ $auctionProduct->id_ikan }}"
                                            data-endtime="{{ $auctionProduct->event->tgl_akhir }}"
                                            data-end-extratime="{{ $auctionProduct->tgl_akhir_extra_time }}"
                                            style="text-align: end;color :red;font-size:75%;">00:00:00</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <img src="{{ url('img/nolelang.png') }}" class="d-block w-100 mt-5" alt="ceklis">
            @endforelse
        </div>
    </div>

    <div class="container nav-samping">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            @forelse($auctionProducts as $auctionProduct)
                @php
                    $photo = 'img/koi11.jpg';
                    if ($auctionProduct->photo !== null) {
                        $photo = url('storage') . '/' . $auctionProduct->photo->path_foto;
                    }

                    $currentMaxBid = $auctionProduct->ob;

                    if ($auctionProduct->maxBid !== null) {
                        $currentMaxBid = $auctionProduct->maxBid->nominal_bid;
                    }
                @endphp
                <div class="col">
                    <a class="text-dark" href="/auction">
                        <div class="card">
                            @php
                                $photo = 'img/koi11.jpg';
                                if ($auctionProduct->photo !== null) {
                                    $photo = url('storage') . '/' . $auctionProduct->photo->path_foto;
                                }
                            @endphp
                            <img src="{{ $photo }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="cb-judu">
                                    <h5 class="card-title"> {!! Illuminate\Support\Str::limit(
                                        "$auctionProduct->variety | $auctionProduct->breeder | Pedigree | $auctionProduct->size | $auctionProduct->bloodline",
                                        32,
                                    ) !!}
                                    </h5>
                                </div>
                                {{-- <p class="card-text ma">Starting Price</p>
                            <p style="color :red">Rp. {{ number_format($auctionProduct->ob, 0, '.', '.') }}</p> --}}
                                <p class="m-0">Number of bids</p>
                                <p class="" style="color: red">{{ $auctionProduct->bid_details_count }}</p>
                                <div class="row">
                                    <div class="col-6 p-0 px-lg-2">
                                        <p class="m-0" style="font-size:80%">Harga saat ini</p>
                                        <p class="m-0" style="color: red;font-size:75%">Rp {{ number_format($currentMaxBid, 0, '.', '.') }}</p>
                                    </div>
                                    <div class="col-6 p-0 px-lg-2">
                                        <p class="m-0" style="text-align: end;font-size:80%">Live Time</p>
                                        <p class="m-0 countdown-label" id="bawah-{{ $auctionProduct->id_ikan }}"
                                            data-endtime="{{ $auctionProduct->event->tgl_akhir }}"
                                            data-end-extratime="{{ $auctionProduct->tgl_akhir_extra_time }}"
                                            style="text-align: end;color :red;font-size:75%;">00:00:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <img src="{{ url('img/nolelang.png') }}" class="d-block w-100 mt-5" alt="ceklis">
            @endforelse
        </div>
    </div>

    <div class="container mt-5">
        {{-- <h5><b>Hot Product</b></h5> --}}
    </div>



    <div class="container nav-atas">
        <div class="d-flex overflow-scroll">
            @forelse($hotProductStores as $hotProduct)
                @php
                    $productPhoto2 = 'img/bio_media.png';

                    if ($hotProduct->photo !== null) {
                        $productPhoto2 = url('storage') . '/' . $hotProduct->photo->path_foto;
                    }

                    $wishlistClass = 'far fa-heart';

                    if (array_key_exists('wishlist', $hotProduct->toArray()) && $hotProduct->wishlist !== null) {
                        $wishlistClass = 'fas fa-heart';
                    }
                @endphp
                <div class="p-1">
                    <div class="p-3 border bg-light" style="width: 200px;">
                        <a href="/login">
                            <img src="{{ $productPhoto2 }}" alt="bio media" class="card-img-top"
                                style=" height: 166;width: 166;">
                        </a>
                        <div class="cb-jud">
                            <p>{!! Illuminate\Support\Str::limit("$hotProduct->merek_produk $hotProduct->nama_produk", 45) !!}</p>
                        </div>
                        <p><b>Rp. {{ number_format($hotProduct->harga, 0, '.', '.') }}</b></p>
                        <div class="row">
                            <div class="col-6 p-0">
                                <button class="border-0 btn-success rounded-2" style="background-color:#188518;">Order
                                    Now</button>
                            </div>
                            <div class="col-3 m-auto">
                                <button class="rounded"
                                    style="background-color: red;border-color:red; outline: none; border: none;"><i
                                        class="fa-solid fa-cart-shopping" style="color: white"></i></button>
                            </div>
                            <div class="col-3 m-auto">
                                <button class="border-0" style="background-color: transparent"><i
                                        class="{{ $wishlistClass }} wishlist" data-id="{{ $hotProduct->id_produk }}"
                                        style="font-size: x-large"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>

    <div class="class nav-samping">
        <div class="container">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                @forelse($hotProductStores as $hotProduct)
                    @php
                        $productPhoto = 'img/bio_media.png';

                        if ($hotProduct->photo !== null) {
                            $productPhoto = url('storage') . '/' . $hotProduct->photo->path_foto;
                        }

                        $wishlistClass = 'far fa-heart';

                        if (array_key_exists('wishlist', $hotProduct->toArray()) && $hotProduct->wishlist !== null) {
                            $wishlistClass = 'fas fa-heart';
                        }
                    @endphp
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <a href="{{ url('/onelito_store') . '/' . $hotProduct->id_produk }}"><img
                                    src="{{ $productPhoto }}" alt="bio media" class="card-img-top" height="170"></a>
                            <div class="cb-judu">
                                <p>{!! Illuminate\Support\Str::limit("$hotProduct->merek_produk $hotProduct->nama_produk", 35) !!}</p>
                            </div>
                            <p><b>Rp. {{ number_format($hotProduct->harga, 0, '.', '.') }}</b></p>
                            <div class="row">
                                <div class="col-md-6 d-grid p-0">
                                    <button class="border-0 btn-success rounded-2" style="background-color:#188518;">Order
                                        Now</button>
                                </div>
                                <div class="col-md-3 m-auto">
                                    <button class="rounded"
                                        style="background-color: red;border-color:red; outline: none; border: none;"><i
                                            class="fa-solid fa-cart-shopping" style="color: white"></i></button>
                                </div>
                                <div class="col-md-3 m-auto">
                                    <button class="border-0" style="background-color: transparent"><i
                                            data-id="{{ $hotProduct->id_produk }}" class="{{ $wishlistClass }} wishlist"
                                            style="font-size: x-large"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="container mt-5 text-center">
        <h3>ONELITO <span style="color:red;">KOI</span></h3>
        <br>
    </div>
    <div class="container">
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictum a tellus tortor vulputate
            sodales. Et scelerisque a, rutrum elit. Quam nulla tortor nunc lacus. Odio sit id sollicitudin nibh orci sed
            egestas. Diam, sit mi, et pharetra in ut augue tristique quis. Diam sed dapibus adipiscing nulla amet et aliquet
            auctor</p>
        <p class="text-center"> Dolor, in et, cursus id felis sit lacus. In tristique nullam sed magna proin lacinia amet.
            Viverra sed lectus eu nam.Justo, leo massa enim, et felis aenean.</p>

        <p class="text-center mb-5">Volutpat risus accumsan feugiat in et id egestas. Sed morbi tristique nunc arcu.
            Lobortis tortor in lectus tellus non, pretium viverra. Nibh mattis condimentum consectetur ut facilisi fermentum
            mattis aliquam. </p>
    </div>







    <div class="container">
        <div class="justify-content-around row">
            <div class="border col-lg-2 col-9 mt-4">
                <div class="">
                    <p class="style text-center"><i class="fa-solid fa-envelope" style="color: red"></i></p>
                    <p class="style text-center"><b>Email</b></p>
                    <p class="style text-center">onelito.koi@gmail.com</p>
                </div>
            </div>
            <div class="border col-lg-2 col-9 mt-4">
                <div class="">
                    <p class="style text-center"><i class="fa-solid fa-bag-shopping" style="color: red"></i></p>
                    <p class="style text-center"><b>Tokopedia</b></p>
                    <a href="https://www.tokopedia.com/onelitokoi">
                        <p class="style text-center">onelitokoi</p>
                    </a>
                </div>
            </div>
            <div class="border col-lg-2 col-9 mt-4">
                <div class="">
                    <p class="style text-center"><i class="fas fa-map-marker-alt" style="color: red"></i></p>
                    <p class="style text-center"><b>Address</b></p>
                    <p class="style text-center">Jl. Tandon Ciater D No. 50, BSD, Ciater, Serpong, Tangerang selatan Banten
                        15310</p>
                </div>
            </div>
            <div class="border col-lg-2 col-9 mt-4">
                <div class="">
                    <p class="style text-center"><i class="fas fa-phone" style="color: red"></i></p>
                    <p class="style text-center"><b>Contact Us</b></p>
                    <p class="style text-center">0811-972-857</p>
                    <p class="style text-center">0811-972-857</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mt-4">
                <div class="card">
                    <p class="style text-center"><i class="fa-solid fa-envelope" style="color: red"></i></p>
                    <p class="style text-center"><b>Email</b></p>
                    <p class="style text-center">onelito.koi@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-3 col-12 mt-4">
                <div class="card">
                    <p class="style text-center"><i class="fa-solid fa-bag-shopping" style="color: red"></i></p>
                    <p class="style text-center"><b>Tokopedia</b></p>
                    <a href="https://www.tokopedia.com/onelitokoi">
                        <p class="style text-center">onelitokoi</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-12 mt-4">
                <div class="card">
                    <p class="style text-center"><i class="fas fa-map-marker-alt" style="color: red"></i></p>
                    <p class="style text-center"><b>Address</b></p>
                    <p class="style text-center">Jl. Tandon Ciater D No. 50, BSD, Ciater, Serpong, Tangerang selatan Banten 15310</p>
                </div>
            </div>
            <div class="col-lg-3 col-12 mt-4">
                <div class="card">
                    <p class="style text-center"><i class="fas fa-phone" style="color: red"></i></p>
                    <p class="style text-center"><b>Contact Us</b></p>
                    <p class="style text-center">0811-972-857</p>
                    <p class="style text-center">0811-972-857</p>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluit m-5">
        {{-- <img src="img/gc.png" alt="gc" class="w-100"> --}}
    </div>

    <div class="container">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            @forelse($championFishes as $championFish)
                @php
                    $photoChampion = 'img/koi12.jpg';

                    if ($championFish->foto_ikan !== null) {
                        $photoChampion = url('storage') . '/' . $championFish->foto_ikan;
                    }
                @endphp
                <div class="col mt-3">
                    <div class="card">
                        <img src="{{ $photoChampion }}" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">{!! Illuminate\Support\Str::limit("$championFish->nama_champion", 18) !!}</h5>
                            <p class="card-text ma">Tahun : {{ $championFish->tahun }}</p>
                            <p>Size : {{ $championFish->size }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>

    <div class="container my-5">
        <a href="/detail_koichampion" style="color: red">Lihat lebih Banyak >></a>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let currentTime = "{{ $now }}";
        let timerLabels = document.getElementsByClassName('countdown-label');

        function allTimer() {
            $.each(timerLabels, function(prefix, val) {
                var addedExtraTime = $(val).attr('data-end-extratime');
                var currentEndTime = $(val).attr('data-endtime');

                startTimer(addedExtraTime, currentEndTime, val)
            })
        }

        allTimer()

        function startTimer(addedExtraTime, currentEndTime, val) {
            var currTime = moment()
            var end = moment(currentEndTime);
            var endTime = end.valueOf();

            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time and extend it
                var now = currTime.add(1, 'seconds').valueOf();

                // Find the distance between now and the count down date
                var duration = endTime - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(duration / (1000 * 60 * 60 * 24));
                var hours = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                hours = hours + (days * 60);
                var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((duration % (1000 * 60)) / 1000);

                // Display the result in the element with id="timer"
                const hourString = `${hours < 10 ? '0' : ''}${hours}`;
                const minuteString = `${minutes < 10 ? '0' : ''}${minutes}`;
                const secondString = `${seconds < 10 ? '0' : ''}${seconds}`;
                const timerString = `${hourString}:${minuteString}:${secondString}`;
                $(val).html(timerString);

                // If the count down is finished, finish the exam
                if (duration < 0) {
                    $(val).html(`00:00:00`);

                    clearInterval(x);
                    startExtraTimer(addedExtraTime, val);
                }
            }, 1000);
        }

        function startExtraTimer(addedExtraTime, val) {
            var currTime = moment()

            var end = moment(addedExtraTime);
            var endTime = end.valueOf();
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time and extend it
                var now = currTime.add(1, 'seconds').valueOf();

                // Find the distance between now and the count down date
                var duration = endTime - now;
                // duration = 0;

                // console.log($(val))

                // Time calculations for days, hours, minutes and seconds
                // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((duration % (1000 * 60)) / 1000);

                // Display the result in the element with id="timer"
                const hourString = `${hours < 10 ? '0' : ''}${hours}`;
                const minuteString = `${minutes < 10 ? '0' : ''}${minutes}`;
                const secondString = `${seconds < 10 ? '0' : ''}${seconds}`;
                const timerString = `${hourString}:${minuteString}:${secondString}`;
                $(val).html(timerString);

                // If the count down is finished, finish the exam
                if (duration < 0) {
                    var id = $(val).attr('id');
                    $(val).html(`00:00:00`);

                    clearInterval(x);
                }
            }, 1000);
        }

        $(document).on('click', '.wishlist', function(e) {
            var element = $(e.currentTarget);
            var elClass = element.attr('class');
            var id = element.attr('data-id');

            if (elClass === 'far fa-heart wishlist') {
                $.ajax({
                    type: 'POST',
                    url: `wishlists`,
                    data: {
                        id_produk: id
                    },
                    dataType: "json",
                    success: function(res) {
                        element.attr('class', 'fas fa-heart wishlist');

                        return true;
                    },
                    error: function(error) {
                        console.log(error)
                        return false
                    }

                })
            }

            if (elClass === 'fas fa-heart wishlist') {
                $.ajax({
                    type: 'DELETE',
                    url: `wishlists/${id}`,
                    data: {
                        id_produk: id
                    },
                    dataType: "json",
                    success: function(res) {
                        element.attr('class', 'far fa-heart wishlist');
                        return true;
                    },
                    error: function(error) {
                        console.log(error)
                        return false
                    }
                })
            }
        })
    </script>
@endpush

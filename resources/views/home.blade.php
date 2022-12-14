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
    </style>


    <nav class="nav-samping navbar navbar-expand-lg navbar-light bg-danger">
        <div class="container">
            <a class="w-25 navbar-brand" href="/">
                <img src="{{ url('img/logo-onelito.jpg') }}" alt="ONELITO" class="w-100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse flex-grow-0 navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link "href="/">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="/auction">AUCTION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="/onelito_store">ONELITO
                            STORE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="/koi_stok">KOI
                            STOCK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="/login">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

    @php
        $auctionProducts = $nextAuction->pluck('auctionProducts')->flatten();
    @endphp
    <div class="container nav-atas">
        <div class="row">
            @forelse($auctionProducts as $auctionProduct)
                <div class="col-6 col-lg-3 mt-3">
                    <div class="card">
                        @php
                            $photo = 'img/koi11.jpg';
                            if ($auctionProduct->photo !== null) {
                                $photo = url('storage') . '/' . $auctionProduct->photo->path_foto;
                            }
                        @endphp
                        <img src="{{ $photo }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="cb-jud">
                                <h5 class="card-title">{!! Illuminate\Support\Str::limit(
                                    "$auctionProduct->variety | $auctionProduct->breeder | Pedigree | $auctionProduct->size | $auctionProduct->bloodline",
                                    45,
                                ) !!}</h5>
                            </div>
                            <p style="font-size: 10px" class="card-text ma">Starting Price</p>
                            <p style="color :red;font-size: 12px" class="m-0">Rp.
                                {{ number_format($auctionProduct->ob, 0, '.', '.') }}</p>
                        </div>
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
                <div class="col">
                    <div class="card">
                        @php
                            $photo = 'img/koi11.jpg';
                            if ($auctionProduct->photo !== null) {
                                $photo = url('storage') . '/' . $auctionProduct->photo->path_foto;
                            }
                        @endphp
                        <img src="{{ $photo }}" class="card-img-top" alt="..." style="height: 18rem">
                        <div class="card-body">
                            <div class="cb-judu">
                                <h5 class="card-title"> {!! Illuminate\Support\Str::limit(
                                    "$auctionProduct->variety | $auctionProduct->breeder | Pedigree | $auctionProduct->size | $auctionProduct->bloodline",
                                    32,
                                ) !!}
                                </h5>
                            </div>
                            <p class="card-text ma">Starting Price</p>
                            <p style="color :red">Rp. {{ number_format($auctionProduct->ob, 0, '.', '.') }}</p>
                        </div>
                    </div>
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
                    
                    if ($hotProduct->wishlist !== null) {
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
                            <div class="col-2 m-auto">
                                <button class="border-4 rounded" style="background-color: red;border-color:red"><i
                                        class="fa-solid fa-cart-shopping" style="color: white"></i></button>
                            </div>
                            <div class="col-2 m-auto">
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
                        
                        if ($hotProduct->wishlist !== null) {
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
                                    <button class="border-4 rounded" style="background-color: red;border-color:red"><i
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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

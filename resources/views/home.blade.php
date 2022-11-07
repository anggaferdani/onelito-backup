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

        @media screen and (max-width: 600px) {

            .img-mh-300px img {
                min-height: 400vh;
            }
        }

        .cb-judul {
            height: 7rem;

        }

        .cb-judu {
            height: 5rem;
        }
    </style>



    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
        <h5><b>Next event</b></h5>
    </div>

    @php
        $auctionProducts = $nextAuction->auctionProducts ?? [];
    @endphp
    <div class="container nav-atas">
        <div class="row">
        @forelse($auctionProducts as $auctionProduct)
            <div class="col-6 col-lg-3 mt-3">
            <div class="card">
                @php
                    $photo = 'img/koi.jpg';
                    if ($auctionProduct->photo !== null)
                    {
                        $photo = url('storage') .'/'. $auctionProduct->photo->path_foto;
                    }
                @endphp
                <img src="{{ $photo }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="cb-judu">
                        <h5 style="font-size: 10px" class="card-title">{{ $auctionProduct->variety }} |   {{ $auctionProduct->breeder }} | Pedigree | {{ $auctionProduct->size }} | {{ $auctionProduct->bloodline }}</h5>
                    </div>
                    <p style="font-size: 10px" class="card-text ma" >Starting Price</p>
                    <p style="color :red;font-size: 12px">Rp. {{ $auctionProduct->ob }}</p>
                </div>
            </div>
            </div>
        @empty
        @endforelse
        </div>
    </div>

    <div class="container nav-samping">
        <div class="row">
        @forelse($auctionProducts as $auctionProduct)
            <div class="col-6 col-lg-3 mt-3">
            <div class="card">
                @php
                    $photo = 'img/koi.jpg';
                    if ($auctionProduct->photo !== null)
                    {
                        $photo = url('storage') .'/'. $auctionProduct->photo->path_foto;
                    }
                @endphp
                <img src="{{ $photo }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="cb-judu">
                        <h5 style="font-size: 10px" class="card-title">{{ $auctionProduct->variety }} |   {{ $auctionProduct->breeder }} | Pedigree | {{ $auctionProduct->size }} | {{ $auctionProduct->bloodline }}</h5>
                    </div>
                    <p class="card-text ma" >Starting Price</p>
                    <p style="color :red">Rp. {{ $auctionProduct->ob }}</p>
                </div>
            </div>
            </div>
        @empty
        @endforelse
        </div>
    </div>

    <div class="container mt-5">
        <h5><b>Hot Product</b></h5>
    </div>



    <div class="container nav-atas">
        <div class="d-flex overflow-scroll">
        @forelse($hotProductStores as $hotProduct)
            @php
                $productPhoto2 = 'img/bio_media.png';

                if ($hotProduct->photo !== null) {
                    $productPhoto2 = url('storage').'/'.$hotProduct->photo->path_foto;
                }
            @endphp
            <div class="p-1">
                <div class="p-3 border bg-light" style="width: 200px;/* height: 200px; */">
                    <a href="/login">
                    <img src="{{ $productPhoto2 }}" alt="bio media" class="card-img-top" style=" height: 166;width: 166;">
                    </a>
                    <div class="cb-judu">
                        <p>{{ "$hotProduct->merek_produk $hotProduct->nama_produk" }}</p>
                    </div>
                    <p><b>Rp. {{ $hotProduct->harga }}</b></p>
                    <div class="row">
                    <div class="col-6 p-0">
                        <button class="border-0 btn-success rounded-2" style="background-color:#188518;">Order Now</button>
                    </div>
                    <div class="col-2 m-auto">
                        <button class="border-4 rounded" style="background-color: red;border-color:red"><i class="fa-solid fa-cart-shopping" style="color: white"></i></button>
                    </div>
                    <div class="col-2 m-auto">
                        <button class="border-0" style="background-color: transparent"><i class="far fa-heart" style="font-size: x-large"></i></button>
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
                        $productPhoto = url('storage').'/'.$hotProduct->photo->path_foto;
                    }
                @endphp
                <div class="col">
                    <div class="p-3 border bg-light">
                    <a href="/detail_onelito_store"><img src="{{ $productPhoto }}" alt="bio media" class="card-img-top" height="170"></a>
                    <p>{{ "$hotProduct->merek_produk $hotProduct->nama_produk" }}</p>
                    <p><b>Rp. {{ $hotProduct->harga }}</b></p>
                    <div class="row">
                        <div class="col-md-6 d-grid p-0">
                        <button class="border-0 btn-success rounded-2" style="background-color:#188518;">Order Now</button>
                        </div>
                        <div class="col-md-3 m-auto">
                        <button class="border-4 rounded" style="background-color: red;border-color:red"><i class="fa-solid fa-cart-shopping" style="color: white"></i></button>
                        </div>
                        <div class="col-md-3 m-auto">
                        <button class="border-0" style="background-color: transparent"><i class="far fa-heart" style="font-size: x-large"></i></button>
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
            <div class="border col-lg-3 col-9 mt-4">
                <div class="card-body">
                    <p class="style text-center"><i class="fa-solid fa-envelope" style="color: red"></i></p>
                    <p class="style text-center"><b>Email</b></p>
                    <p class="style text-center">onelito@gmail.com</p>
                </div>
            </div>
            <div class="border col-lg-3 col-9 mt-4">
                <div class="card-body">
                    <p class="style text-center"><i class="fas fa-map-marker-alt" style="color: red"></i></p>
                    <p class="style text-center"><b>Address</b></p>
                    <p class="style text-center">Jl. Tandon Ciater D No. 50, BSD, Ciater, Serpong Sub-District, South
                        Tangerang City Banten 15310</p>
                </div>
            </div>
            <div class="border col-lg-3 col-9 mt-4">
                <div class="card-body">
                    <p class="style text-center"><i class="fas fa-phone" style="color: red"></i></p>
                    <p class="style text-center"><b>Contact Us</b></p>
                    <p class="style text-center">0811-972-857</p>
                    <p class="style text-center">0811-972-857</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluit m-5">
        <img src="img/gc.png" alt="gc" class="w-100">
    </div>

    <div class="container">
        <div class="row ">
        @forelse($championFishes as $championFish)
            @php
                $photoChampion = 'img/koi_2.jpg';

                if ($championFish->foto_ikan !== null)
                {
                    $photoChampion = url('storage').'/'. $championFish->foto_ikan;
                }
            @endphp
            <div class="col-lg-3 col-6 mt-3">
            <div class="card modal-header">
                <img src="{{ $photoChampion }}" class="card-img-top" alt="...">
                <div class="m-2 me-auto">
                <h5 class="card-title">{{ $championFish->nama_champion }}</h5>
                <p class="card-text ma" >Tahun : {{ $championFish->tahun }}</p>
                <p >Size : {{ $championFish->size }}</p>
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

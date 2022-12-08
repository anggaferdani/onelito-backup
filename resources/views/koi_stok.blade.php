@extends('layout.main')

@section('container')
    <style>
        /* .card {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                flex-direction: column;
            } */

        .cb-judul {
            height: 4rem;
        }

        @media screen and (max-width: 600px) {
            .nav-samping {
                display: none;
            }

        }
    </style>


    <nav class="nav-samping navbar navbar-expand-lg navbar-light bg-light">
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

    <div class="container-fluit">
        <div class="container">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-5">
                @forelse($fishes as $fish)
                    @php
                        $photo = 'img/koi_3.jpg';
                    @endphp

                    <div class="col mt-5">
                        <div class="card">
                            <img src="img/koi12.jpg" class="card-img-top" alt="..." style="height: 310px">
                            <div class="card-body">
                                <div class="cb-judul">
                                    <h5 class="card-title">{!! Illuminate\Support\Str::limit(
                                        "$fish->variety | $fish->breeder | Pedigree | $fish->size | $fish->bloodline",
                                        50,
                                    ) !!}</h5>
                                </div>
                                <p class="my-3" style="color :red">Rp. {{ $fish->harga_ikan }}</p>
                                <div class="row">
                                    <div class="col-6 col-lg-6 px-1">
                                        <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1"
                                            style="font-size: 70%">Question <span><i
                                                    class="fa-brands fa-whatsapp"></i></span></a>
                                    </div>
                                    <div class="col-6 col-lg-6 px-1">
                                        <a href="/login"
                                            class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-0 px-lg-2"
                                            style="font-size: 70%">DETAIL <span><i
                                                    class="fa-solid fa-circle-chevron-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

                <!-- <div class="col-6 col-lg-3 mt-5">
                            <div class="card">
                                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="cb-judul">
                                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farmee | Size | Farm</h5>
                                    </div>
                                    <p class="my-3" style="color :red">Rp. 7.500.000</p>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 70%">Question <span><i class="fa-brands fa-whatsapp"></i></span></a>
                                        </div>
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-lg-2" style="font-size: 70%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 mt-5">
                            <div class="card">
                                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="cb-judul">
                                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farmee | Size | Farm</h5>
                                    </div>
                                    <p class="my-3" style="color :red">Rp. 7.500.000</p>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 70%">Question <span><i class="fa-brands fa-whatsapp"></i></span></a>
                                        </div>
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-lg-2" style="font-size: 70%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 mt-5">
                            <div class="card">
                                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="cb-judul">
                                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farmee | Size | Farm</h5>
                                    </div>
                                    <p class="my-3" style="color :red">Rp. 7.500.000</p>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 70%">Question <span><i class="fa-brands fa-whatsapp"></i></span></a>
                                        </div>
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-lg-2" style="font-size: 70%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
            </div>
            <div class="btn-toolbar mb-3 justify-content-end" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-danger">1</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-danger">2</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-danger">3</button>
                </div>
            </div>
            <!-- <div class="row mb-5">
                        <div class="col-6 col-lg-3 mt-5">
                            <div class="card">
                                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="cb-judul">
                                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farmee | Size | Farm</h5>
                                    </div>
                                    <p class="my-3" style="color :red">Rp. 7.500.000</p>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 70%">Question <span><i class="fa-brands fa-whatsapp"></i></span></a>
                                        </div>
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-lg-2" style="font-size: 70%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 mt-5">
                            <div class="card">
                                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="cb-judul">
                                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farmee | Size | Farm</h5>
                                    </div>
                                    <p class="my-3" style="color :red">Rp. 7.500.000</p>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 70%">Question <span><i class="fa-brands fa-whatsapp"></i></span></a>
                                        </div>
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-lg-2" style="font-size: 70%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 mt-5">
                            <div class="card">
                                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="cb-judul">
                                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farmee | Size | Farm</h5>
                                    </div>
                                    <p class="my-3" style="color :red">Rp. 7.500.000</p>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 70%">Question <span><i class="fa-brands fa-whatsapp"></i></span></a>
                                        </div>
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-lg-2" style="font-size: 70%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 mt-5">
                            <div class="card">
                                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="cb-judul">
                                        <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farmee | Size | Farm</h5>
                                    </div>
                                    <p class="my-3" style="color :red">Rp. 7.500.000</p>
                                    <div class="row">
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between p-1" style="font-size: 70%">Question <span><i class="fa-brands fa-whatsapp"></i></span></a>
                                        </div>
                                        <div class="col-6 col-lg-6 px-1">
                                            <a href="/login" class="btn btn-secondary w-100 d-flex justify-content-between p-1 px-lg-2" style="font-size: 70%">DETAIL <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
        </div>
    </div>
@endsection

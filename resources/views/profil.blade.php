<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- boxicons CSS --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title>ONELITO KOI</title>

    <style>
        @media screen and (max-width: 600px) {
            .font-footer {
                font-size:
            }

            a {
                font-size: 10px !important;
            }

            h1 {
                font-size: 17px !important;
            }

            h4 {
                font-size: 12px !important;
            }

            h5 {
                font-size: 11px !important;
            }

            h6 {
                font-size: 10px !important;
            }

            p {
                font-size: 10px !important;
            }
        }
    </style>
</head>

<body>

    <style>
        /* On screens that are 992px or less, set the background color to blue */
        @media screen and (min-width: 601px) {
            .res {
                display: none;
            }
        }

        /* On screens that are 600px or less, set the background color to olive */
        @media screen and (max-width: 600px) {
            .web {
                display: none;
            }
        }
    </style>

    <div class="res">
        <div class="container-fluid py-3">
            <div class="fixed-top p-4 bg-white">
                <div class="container mb-3">
                    <div class="d-flex">
                        <a href="/profil" class="{{ $title === 'profil' ? 'active' : '' }}">
                            <div class="d-flex">
                                <i class="fa-solid fa-circle-user mr-4" style="font-size: xx-large"></i>
                                <div>
                                    <h4 style="font-size: 15px" class="text-start">{{ $auth->nama }}</h4>
                                    <p style="font-size: 12px" class="text-start">{{ $auth->email }}</p>
                                </div>
                            </div>
                        </a>
                        <div class="ml-auto" style="font-size: 22px">
                            <a href="/"><i class='bx bx-x-circle text-danger' style="font-size: x-large"></i></a>
                        </div>
                    </div>
                </div>
                <div class="container overflow-scroll">
                    <div class="d-flex" style="width: 92vw">
                        <a href="#" style="font-size: 11px" class="btn btn-outline-secondary rounded-pill mr-2 ">
                            <i class='bx bx-menu-alt-left'></i>
                            Filter</a>
                        <a href="/shoppingcart" style="font-size: 11px"
                            class="btn btn-outline-secondary rounded-pill mr-2 {{ $title === 'Shopping Cart' ? 'active' : '' }}">Shopping
                            cart</a>

                        <a href="/wishlist" style="font-size: 11px"
                            class="btn btn-outline-secondary rounded-pill mr-2 {{ $title === 'wishlist' ? 'active' : '' }}">WishList</a>

                        <a href="/purchase" style="font-size: 11px"
                            class="btn btn-outline-secondary rounded-pill mr-2 {{ $title === 'purchase' ? 'active' : '' }}">Purchase
                            history</a>

                    </div>
                </div>
            </div>

            <div style="margin-top: 17vh; margin-bottom: 10vh">
                <div class="container my-3 text-center">
                    <h5><i class="fa-solid fa-user"></i> <strong>Profile</strong></h5>
                </div>
                <div class="container p-0">
                    <img src="img/foto.png" class="card-img-top px-5" alt="image">
                    <div class="container text-center">
                        <button type="button" class="btn btn-light btn-sm">
                            <a href="#" class="border btn btn-light" style="width: 68vw">
                                Change photo</a>
                        </button>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <p class="m-0">Name:</p>
                            <p><b>{{ $auth->nama }}</b></p>
                        </div>
                        <div class="mb-3">
                            <p class="m-0">Email:</p>
                            <p><b>{{ $auth->email }}</b></p>
                        </div>
                        <div class="mb-3">
                            <p class="m-0">Phone number:</p>
                            <p><b>{{ $auth->no_hp }}</b></p>
                        </div>
                        <div class="mb-3">
                            <p class="m-0">Address:</p>
                            <p><b>{{ $auth->alamat }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="web">
        <div class="container p-0">
            <a href="/" class="text-dark" style="text-decoration: blink"><i
                    class="fa-solid fa-arrow-left text dark"></i> back to main page</a>
            <br><br>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active bg-tranparent text-body"
                                        style="background-color: white" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home2" type="button" role="tab"
                                        aria-controls="v-pills-home2" aria-selected="true">
                                        <div class="row">
                                            <div class="col-2 p-0">
                                                <i class="fa-solid fa-circle-user" style="font-size: xxx-large"></i>
                                            </div>
                                            <div class="col-10">
                                                <h4 class="m-0 ms-lg-3 text-md-start">{{ $auth->nama }}</h4>
                                                <p class="m-0 ms-lg-3 text-md-start">{{ $auth->email }}</p>
                                            </div>
                                        </div>
                                    </button>
                                    <br>
                                    <h5>Filter</h5>
                                    <button class="nav-link bg-tranparent text-body p-2 text-lg-start"
                                        style="background-color: white;font-size:larger" id="v-pills-profile-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-profile2" type="button"
                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        Shopping cart
                                    </button>
                                    <button class="nav-link text-body p-2 text-lg-start"
                                        style="background-color: white;font-size:larger" id="v-pills-messages-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-messages2" type="button"
                                        role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                        WishList
                                    </button>
                                    <button class="nav-link text-body p-2 text-lg-start"
                                        style="background-color: white;font-size:larger" id="v-pills-settings-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-settings2" type="button"
                                        role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                        Purchase history
                                    </button>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="card p-0">
                        <a class="btn btn-danger w-100 justify-content-between" href="/logout" role="button"
                            style="font-size: x-large">Log Out</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home2" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="container mt-3 my-3">
                                <h5><i class="fa-solid fa-user"></i> <b>Profile</b></h5>
                            </div>
                            <div class="container overflow-hidden p-0">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="p-2 border bg-light m-4">

                                                <img src="img/foto.png" class="card-img-top" alt="image">
                                                <div class="card-body">
                                                    <a href="#"
                                                        class="border btn btn-light w-100 justify-content-between"><b>
                                                            <center>Change photo</center>
                                                        </b></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-8 m-auto p-0">
                                            <div class="">
                                                <p class="m-0">Name:</p>
                                                <p><b>{{ $auth->nama }}</b></p>
                                                <p class="m-0">Email:</p>
                                                <p><b>{{ $auth->email }}</b></p>
                                                <p class="m-0">Phone number:</p>
                                                <p><b>{{ $auth->no_hp }}</b></p>
                                                <p class="m-0">Address:</p>
                                                <p><b>{{ $auth->alamat }}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-profile2" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="container mt-3 my-3">
                                <h5><i class="fa-solid fa-cart-shopping"></i> <b>Shopping cart</b></h5>
                            </div>
                            <div class="container overflow-hidden p-0">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-lg-8 px-3 py-3">
                                            <div class="container py-3">
                                                <input class="form-check-input" style="font-size:large"
                                                    type="checkbox" value="" id="Pilih Semua">
                                                <label class="form-check-label" for="Pilih Semua">
                                                    Pilih Semua
                                                </label>
                                            </div>
                                            <hr class="float-sm-end text-center" style="width: 98%;">
                                            <div class="container">
                                                <div class="container d-flex p-0 my-3">
                                                    <input class="form-check-input mr-3 my-auto" type="checkbox"
                                                        value="" id="flexCheckDefault">
                                                    <div class="card mr-3">
                                                        <a href="/detail_onelito_store"><img src="img/bio_media.png"
                                                                class="card-img-top"
                                                                style="height: 10vh; width: 5vw; object-fit: cover;"
                                                                alt="..."></a>
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Bio Tube Bacteria
                                                            House
                                                            Media Filter</p>
                                                        <p class="m-0"><b>Rp. 1.300.000</b></p>
                                                    </div>
                                                </div>
                                                <div class="container d-flex p-0 my-3 justify-content-between">
                                                    <p class="my-auto text-danger">Tulis Catatan</p>
                                                    <p class="my-auto text-center">
                                                        Pindahkan ke Wishlist |
                                                    </p>
                                                    <button class="border-0" style="background-color: transparent"><i
                                                            class="fa-regular fa-trash-can"></i></button>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <button type="button" class="border-0 btn-light mr-2"
                                                            style="background-color:tranparent">
                                                            <i class="fa-sharp fa-solid fa-circle-minus text-black-50"
                                                                style="font-size: larger"></i>
                                                        </button>
                                                        <h1> 1 </h1>
                                                        <button type="button" class=" border-0 btn-light ml-2">
                                                            <i class="fa-solid fa-circle-plus text-danger"
                                                                style="font-size: larger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="float-sm-end text-center mb-3" style="width: 98%;">
                                            <div class="container">
                                                <div class="container d-flex p-0 my-3">
                                                    <input class="form-check-input mr-3 my-auto" type="checkbox"
                                                        value="" id="flexCheckDefault">
                                                    <div class="card mr-3">
                                                        <a href="/detail_onelito_store"><img src="img/bio_media.png"
                                                                class="card-img-top"
                                                                style="height: 10vh; width: 5vw; object-fit: cover;"
                                                                alt="..."></a>
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Bio Tube Bacteria
                                                            House
                                                            Media Filter</p>
                                                        <p class="m-0"><b>Rp. 1.300.000</b></p>
                                                    </div>
                                                </div>
                                                <div class="container d-flex p-0 my-3 justify-content-between">
                                                    <p class="my-auto text-danger">Tulis Catatan</p>
                                                    <p class="my-auto text-center">
                                                        Pindahkan ke Wishlist |
                                                    </p>
                                                    <button class="border-0" style="background-color: transparent"><i
                                                            class="fa-regular fa-trash-can"></i></button>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <button type="button" class="border-0 btn-light mr-2"
                                                            style="background-color:tranparent">
                                                            <i class="fa-sharp fa-solid fa-circle-minus text-black-50"
                                                                style="font-size: larger"></i>
                                                        </button>
                                                        <h1> 1 </h1>
                                                        <button type="button" class=" border-0 btn-light ml-2">
                                                            <i class="fa-solid fa-circle-plus text-danger"
                                                                style="font-size: larger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="float-sm-end text-center mb-3" style="width: 98%;">
                                        </div>
                                        <div class="col-lg-4 w-auto">
                                            <div class="card w-100">
                                                <div class="card-body ">
                                                    <h5 class="card-title mb-3">Ringkasan belanja</h5>
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <h6 class="card-subtitle text-muted">Total Harga (0 barang)
                                                            </h6>
                                                        </div>
                                                        <div class="col-3">
                                                            <h6 class="card-subtitle text-muted text-end">Rp0</h6>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 class="card-subtitle">Total harga</h6>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="card-subtitle text-muted text-end">Rp0</h6>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <a class="btn btn-secondary w-100 justify-content-between "
                                                        href="/transaksiweb">Pesan
                                                        Sekarang (0)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-messages2" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <div class="container mt-3 my-3">
                                <h5><i class="fa-regular fa-heart"></i> <b>Wishlist</b></h5>
                            </div>
                            <div class="container overflow-hidden p-0">
                                <div class="card">
                                    <div class="row m-4">
                                        <h4>2 <span>Barang</span></h4>
                                        <div class="border col-3 m-1">
                                            <div class="cart">
                                                <a href="/detail_onelito_store"><img src="img/bio_media.png"
                                                        alt="bio media" class="card-img-top" height="170"></a>
                                                <p>Bio Tube Bacteria House
                                                    Media Filter</p>
                                                <p><b>Rp. 1.300.000</b></p>
                                                <button class="mb-3 text-danger "
                                                    style="background-color: transparent;font-size:small;border-color:red"><i
                                                        class="fa-solid fa-plus"></i> <span>Keranjang</span></button>
                                            </div>
                                        </div>
                                        <div class="col-3 border m-1">
                                            <img src="img/uniring.jpeg" alt="uniring" class="card-img-top"
                                                height="170">
                                            <p>Uniring rubber hose /
                                                selang aerasi</p>
                                            <p><b>Rp. 580.000</b></p>
                                            <button class="mb-3 text-danger "
                                                style="background-color: transparent;font-size:small;border-color:red"><i
                                                    class="fa-solid fa-plus"></i> <span>Keranjang</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-settings2" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <div class="container mt-3 my-3">
                                <h5><i class="fa-solid fa-bag-shopping"></i> <b>Purchase history</b></h5>
                            </div>
                            <div class="container overflow-hidden p-0">
                                <div class="card">
                                    <div class="row m-4">
                                        <div class=" col-3">
                                            <div class="card p-1">
                                                <a href="/detail_onelito_store">
                                                    <img src="img/bio_media.png" alt="bio media"
                                                        class="card-img-top w-100">
                                                </a>
                                                <p>Bio Tube Bacteria House Media Filter</p>
                                                <p><b>Rp. 1.300.000</b></p>
                                            </div>
                                        </div>
                                        <div class="col-3 ">
                                            <div class="card p-1">
                                                <a href="#">
                                                    <img src="img/uniring.jpeg" alt="uniring"
                                                        class="card-img-top w-100">
                                                </a>
                                                <p>Uniring rubber hose /
                                                    selang aerasi</p>
                                                <p><b>Rp. 580.000</b></p>
                                            </div>
                                        </div>
                                        <div class=" col-3">
                                            <div class="card p-1">
                                                <a href="#">
                                                    <img src="img/Matala.jpg" alt="matala"
                                                        class="card-img-top w-100">
                                                </a>
                                                <p>Matala Abu Media Filter
                                                    Mekanik</p>
                                                <p><b>Rp. 974.000</b></p>
                                            </div>
                                        </div>
                                        <div class="col-3 ">
                                            <div class="card p-1">
                                                <a href="#">
                                                    <img src="img/bak_ukur.jpg" alt="bak_ukur"
                                                        class="card-img-top w-100">
                                                </a>
                                                <p>Mistar ukur koi / penggaris ukur koi /
                                                    bak ukur</p>
                                                <p><b>Rp. 600.000</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="pageContent" id="transaksi">
                            <div class="container mt-3">
                                <h5><i class="fa-solid fa-bag-shopping"></i> <b>Purchase history</b></h5>
                            </div>
                            <div class="container overflow-hidden p-0">
                                <div class="card">
                                    <div class="row m-4">
                                        <div class="border col-3">
                                            <div class="cart">
                                                <a href="/detail_onelito_store"><img src="img/bio_media.png"
                                                        alt="bio media" class="card-img-top" height="170"></a>
                                                <p>Bio Tube Bacteria House
                                                    Media Filter</p>
                                                <p><b>Rp. 1.300.000</b></p>
                                            </div>
                                        </div>
                                        <div class="col-3 border">
                                            <img src="img/uniring.jpeg" alt="uniring" class="card-img-top"
                                                height="170">
                                            <p>Uniring rubber hose /
                                                selang aerasi</p>
                                            <p><b>Rp. 580.000</b></p>
                                        </div>
                                        <div class="border col-3">
                                            <div class="cart">
                                                <img src="img/Matala.jpg" alt="matala" class="card-img-top"
                                                    height="170">
                                                <p>Matala Abu Media Filter
                                                    Mekanik</p>
                                                <p><b>Rp. 974.000</b></p>
                                            </div>
                                        </div>
                                        <div class="col-3 border">
                                            <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top"
                                                height="170">
                                            <p>Mistar ukur koi / penggaris ukur koi /
                                                bak ukur</p>
                                            <p><b>Rp. 600.000</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script type="text/javascript">
        function openPage(event, page) {
            event.preventDefault();

            pageContent = document.getElementsByClassName("pageContent");
            for (var i = 0; i < pageContent.length; i++) {
                pageContent[i].style.display = "none"
            }
            var tot = document.getElementById(page).style.display = "block"
            var aktif = document.getElementsByClassName("cekAktive");
            for (var i = 0; i < aktif.length; i++) {
                aktif[i].className = aktif[i].className.replace(" active", "")
            }

            event.currentTarget.className += " active";
            // console.log(tot)
        }
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

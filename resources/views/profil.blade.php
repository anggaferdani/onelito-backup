<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<title>ONELITO KOI</title>
</head>
<body>

<div class="container p-0">
    <a href="/" class="text-dark" style="text-decoration: blink"><i class="fa-solid fa-arrow-left text dark"></i> back to main page</a>
    <br><br>
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active bg-tranparent text-body" style="background-color: white" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <div class="row">
                                    <div class="col-2 p-0">
                                    <i class="fa-solid fa-circle-user" style="font-size: xxx-large"></i>
                                    </div>
                                    <div class="col-10">
                                    <h4 class="m-0 ms-lg-3 text-md-start">JOHN DOE</h4>
                                    <p class="m-0 ms-lg-3 text-md-start">johndoe@gmail.com</p>
                                    </div>
                                </div>
                            </button>
                            <br>
                            <h5>Filter</h5>
                            <button class="nav-link bg-tranparent text-body p-2 text-lg-start" style="background-color: white;font-size:larger" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                Shopping cart
                            </button>
                            <button class="nav-link text-body p-2 text-lg-start" style="background-color: white;font-size:larger" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                WishList
                            </button>
                            <button class="nav-link text-body p-2 text-lg-start" style="background-color: white;font-size:larger" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                Purchase history
                            </button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="card p-0" style="width: 18rem;">
                <a class="btn btn-danger w-100 justify-content-between" href="/login" role="button" style="font-size: x-large">Log Out</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="container mt-3">
                        <h5><i class="fa-solid fa-user"></i> <b>Profile</b></h5>
                    </div>
                    <div class="container overflow-hidden p-0">
                        <div class="card">
                            <div class="row">
                                <div class="col-4">
                                    <div class="p-2 border bg-light m-4">
                                        
                                            <img src="img/foto.png" class="card-img-top" alt="image">
                                            <div class="card-body">
                                                <a href="#" class="border btn btn-light w-100 justify-content-between"><b><center>Change photo</center> </b></a>
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="col-8 m-auto p-0">
                                    <div class="">
                                        <p class="m-0">Name:</p>
                                        <p><b>John Doe</b></p>
                                        <p class="m-0">Email:</p>
                                        <p><b>johndoe@gmail.com</b></p>
                                        <p class="m-0">Phone number:</p>
                                        <p><b>0857 5694 2365</b></p>
                                        <p class="m-0">Address:</p>
                                        <p><b>Jl. Tandon Ciater D No. 50, BSD, Ciater, Serpong Sub-District,
                                            South Tangerang City, Banten 15310</b></p>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="container mt-3">
                        <h5><i class="fa-solid fa-cart-shopping"></i> <b>Shopping cart</b></h5>
                    </div>
                    <div class="container overflow-hidden p-0">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-7 mx-3 my-4">
                                    <input class="form-check-input" style="font-size:large" type="checkbox" value="" id="Pilih Semua">
                                    <label class="form-check-label" for="Pilih Semua">
                                        Pilih Semua
                                    </label>
                                    <hr>
                                    <div class="form-check">
                                        <input class="form-check-input my-xxl-4 rounded-0" style="font-size: large" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label w-100" for="flexRadioDefault1">
                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="/detail_onelito_store"><img src="img/bio_media.png" alt="bio media" class="card-img-top" style="width: 80px"></a>
                                                </div>
                                                <div class="col-9">
                                                    <p class="m-0" style="font-size:20px">Bio Tube Bacteria House Media Filter</p>
                                                    <p class="m-0"><b>Rp. 1.300.000</b></p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <p class="my-xl-3 text-danger">Tulis Catatan</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="my-xl-3 text-center">
                                                            Pindahkan ke Wishlist    | <span><button class="border-0" style="background-color: transparent"><i class="fa-regular fa-trash-can"></i></button></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <button type="button" class="border-0 btn-light" style="background-color:tranparent">
                                                                <i class="fa-sharp fa-solid fa-circle-minus text-black-50" style="font-size: larger"></i>
                                                            </button>
                                                            <button type="input" class="border-0 p-3" style="background-color: transparent">1</button>
                                                            <button type="button" class=" border-0 btn-light ">
                                                                <i class="fa-solid fa-circle-plus text-danger" style="font-size: larger"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <hr>
                                    <div class="form-check">
                                        <input class="form-check-input my-xxl-4 rounded-0" style="font-size: large" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label w-100" for="flexRadioDefault1">
                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="/detail_onelito_store"><img src="img/uniring.jpeg" alt="bio media" class="card-img-top" style="width: 80px"></a>
                                                </div>
                                                <div class="col-9">
                                                    <p class="m-0" style="font-size:20px">Uniring rubber hose /selang aerasi</p>
                                                    <p class="m-0"><b>Rp. 580.000</b></p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <p class="my-xl-3 text-danger">Tulis Catatan</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="my-xl-3 text-center">
                                                            Pindahkan ke Wishlist    | <span><button class="border-0" style="background-color: transparent"><i class="fa-regular fa-trash-can"></i></button></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <button type="button" class="border-0 btn-light" style="background-color:tranparent">
                                                                <i class="fa-sharp fa-solid fa-circle-minus text-black-50" style="font-size: larger"></i>
                                                            </button>
                                                            <button type="input" class="border-0 p-3" style="background-color: transparent">1</button>
                                                            <button type="button" class=" border-0 btn-light ">
                                                                <i class="fa-solid fa-circle-plus text-danger" style="font-size: larger"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-form-label-lg col-form-label-lg w-auto">
                                    <div class="card" style="width: 17rem;">
                                        <div class="card-body ">
                                            <h5 class="card-title mb-3">Ringkasan belanja</h5>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h6 class="card-subtitle text-muted">Total Harga (0 barang)</h6>
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
                                            <a class="btn btn-secondary w-100 justify-content-between" href="" role="button">Pesan Sekarang (0)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="container mt-3">
                        <h5><i class="fa-regular fa-heart"></i> <b>Wishlist</b></h5>
                    </div>
                    <div class="container overflow-hidden p-0">
                        <div class="card">
                            <div class="row m-4">
                                <h4>2 <span>Barang</span></h4>
                                <div class="border col-3 m-1">
                                    <div class="cart">
                                        <a href="/detail_onelito_store"><img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170"></a>
                                        <p>Bio Tube Bacteria House
                                        Media Filter</p>
                                        <p><b>Rp. 1.300.000</b></p>
                                        <button class="mb-3 text-danger " style="background-color: transparent;font-size:small;border-color:red"><i class="fa-solid fa-plus"></i> <span>Keranjang</span></button>
                                    </div>
                                </div>
                                <div class="col-3 border m-1">
                                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                                    <p>Uniring rubber hose /
                                    selang aerasi</p>
                                    <p><b>Rp. 580.000</b></p>
                                    <button class="mb-3 text-danger " style="background-color: transparent;font-size:small;border-color:red"><i class="fa-solid fa-plus"></i> <span>Keranjang</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="container mt-3">
                        <h5><i class="fa-solid fa-bag-shopping"></i> <b>Purchase history</b></h5>
                    </div>
                    <div class="container overflow-hidden p-0">
                        <div class="card">
                            <div class="row m-4">
                                <div class="border col-3">
                                    <div class="cart">
                                        <a href="/detail_onelito_store"><img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170"></a>
                                        <p>Bio Tube Bacteria House
                                        Media Filter</p>
                                        <p><b>Rp. 1.300.000</b></p>
                                    </div>
                                </div>
                                <div class="col-3 border">
                                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                                    <p>Uniring rubber hose /
                                    selang aerasi</p>
                                    <p><b>Rp. 580.000</b></p>
                                </div>
                                <div class="border col-3">
                                    <div class="cart">
                                        <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
                                        <p>Matala Abu Media Filter
                                        Mekanik</p>
                                        <p><b>Rp. 974.000</b></p>
                                    </div>
                                </div>
                                <div class="col-3 border">
                                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
                                    <p>Mistar ukur koi / penggaris ukur koi /
                                    bak ukur</p>
                                    <p><b>Rp. 600.000</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
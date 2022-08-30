<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>ONELITO KOI</title>
</head>
<body>

<div class="container w-75">
    <a href="/" class="text-dark" style="text-decoration: blink"><i class="fa-solid fa-arrow-left text dark"></i> back to main page</a>
    <br><br>



    {{-- <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class=" active btn btn-colse-white" id="v-pills-profil-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profil" type="button" role="tab" aria-controls="v-pills-profil" aria-selected="true">
                            <div class="row">
                                <div class="col-2 p-0">
                                    <i class="fa-solid fa-circle-user" style="font-size: xxx-large"></i>
                                </div>
                                <div class="col-10">
                                    <h4 class="m-0 text-md-start">JOHN DOE</h4>
                                    <p class="m-0 text-md-start">johndoe@gmail.com</p>
                                </div>
                            </div>  
                            </button>
                            <br><br>
                            <h4>Filter</h4>
                            <button class=" active btn btn-colse-white text-md-start" id="v-pills-shop-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shop" type="button" role="tab" aria-controls="v-pills-shop" aria-selected="true">Shopping Car</button>
                            <button class=" active btn btn-colse-white text-md-start" id="v-pills-wishlish-tab" data-bs-toggle="pill" data-bs-target="#v-pills-wishlish" type="button" role="tab" aria-controls="v-pills-wishlish" aria-selected="true">Wishlist</button>
                            <button class=" active btn btn-colse-white text-md-start" id="v-pills-histori-tab" data-bs-toggle="pill" data-bs-target="#v-pills-histori" type="button" role="tab" aria-controls="v-pills-histori" aria-selected="true">Purchase history</button>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <a class="btn btn-danger w-100 justify-content-between" href="/login" role="button">Log Out</a>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-profil" role="tabpanel" aria-labelledby="v-pills-profil-tab">
                    <div class="container mt-3">
                        <h5><i class="fa-solid fa-user"></i> <b>Profile</b></h5>
                    </div>
                    <div class="container overflow-hidden">
                        <div class="card">
                            <div class="row gx-5">
                                <div class="col-4">
                                    <div class="p-2 border bg-light">
                                        
                                            <img src="img/foto.png" class="card-img-top" alt="image">
                                            <div class="card-body">
                                                <a href="#" class="btn btn-light w-100 justify-content-between"><b><center>Change photo</center> </b></a>
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="p-2 border bg-light">
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
                <div class="tab-pane fade show active" id="v-pills-shop" role="tabpanel" aria-labelledby="v-pills-shop-tab">
                    shop
                </div>
                <div class="tab-pane fade show active" id="v-pills-wishlish" role="tabpanel" aria-labelledby="v-pills-wishlish-tab">
                    wishlish
                </div>
                <div class="tab-pane fade show active" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                    history
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-3">
            <div class="card-body">
                <div class="card text-dark bg-light mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active bg-tranparent btn-danger text-body" style="background-color: white" id="v-pills-profil-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profil" type="button" role="tab" aria-controls="v-pills-profil" aria-selected="true">
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
                            <hr>
                            <h5>Filter</h5>
                            <button class="nav-link bg-tranparent btn-danger text-body m-2" style="background-color: white" id="v-pills-makanan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-makanan" type="button" role="tab" aria-controls="v-pills-makanan" aria-selected="false">Shopping Car</button>
                            <button class="nav-link bg-tranparent btn-danger text-body m-2" style="background-color: white" id="v-pills-alat-tab" data-bs-toggle="pill" data-bs-target="#v-pills-alat" type="button" role="tab" aria-controls="v-pills-alat" aria-selected="false">Wishlist</button>
                            <button class="nav-link bg-tranparent btn-danger text-body" style="background-color: white" id="v-pills-ikan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ikan" type="button" role="tab" aria-controls="v-pills-ikan" aria-selected="false">Purchase history</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
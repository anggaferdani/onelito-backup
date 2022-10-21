@extends('profil')

@section('container')
    <div class="container my-3 text-center">
        <h5><i class="fa-solid fa-bag-shopping"></i> <b>Purchase history</b></h5>
    </div>
    <div class="row">
        <div class="col-6 mt-2">
            <div class="card">
                <a href="/detail_onelito_store">
                    <img src="img/bio_media.png" alt="bio media" class="card-img-top">
                </a>
                <div class="card-body">
                    <p>Bio Tube Bacteria House Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <a href="/detail_onelito_store">
                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top">
                </a>
                <div class="card-body">
                    <p>Uniring rubber hose / selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <a href="/detail_onelito_store">
                    <img src="img/matala.jpg" alt="matala" class="card-img-top">
                </a>
                <div class="card-body">
                    <p>Matala Abu Media Filter Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <a href="/detail_onelito_store">
                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top">
                </a>
                <div class="card-body">
                    <p>Mistar ukur koi / penggaris ukur koi /
                        bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection

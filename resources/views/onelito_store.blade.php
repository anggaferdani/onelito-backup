@extends('layout.main')

@section('container')
<div class="container px-4">
    <div class="row gx-3">
      <div class="col-3">
        <div class="">
          <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">Etalase Toko</div>
            <div class="card-body">
              <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active bg-tranparent btn-danger text-body m-2" style="background-color: white" id="v-pills-Semua-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Semua" type="button" role="tab" aria-controls="v-pills-Semua" aria-selected="true">All Product</button>
                <button class="nav-link bg-tranparent btn-danger text-body m-2" style="background-color: white" id="v-pills-makanan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-makanan" type="button" role="tab" aria-controls="v-pills-makanan" aria-selected="false">Fish Food</button>
                <button class="nav-link bg-tranparent btn-danger text-body m-2" style="background-color: white" id="v-pills-alat-tab" data-bs-toggle="pill" data-bs-target="#v-pills-alat" type="button" role="tab" aria-controls="v-pills-alat" aria-selected="false">Fish Equipment</button>
                <button class="nav-link bg-tranparent btn-danger text-body" style="background-color: white" id="v-pills-ikan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ikan" type="button" role="tab" aria-controls="v-pills-ikan" aria-selected="false">Fish</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-9">
        <div class="">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-Semua" role="tabpanel" aria-labelledby="v-pills-Semua-tab">
              <div class="container mt-3">
              <h5><b>All Product</b></h5>
              </div>
              <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170">
                    <p>Bio Tube Bacteria House
                    Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                    <p>Uniring rubber hose /
                    selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/selang.jpg" alt="selang" class="card-img-top" height="170">
                      <p>Bio Tube Bacteria House
                        Media Filter</p>
                      <p><b>Rp. 90.000</b></p>
                      <div class="col" style="text-align: end">
                        <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                      </div>
                  </div>
                </div>
                <div class="col p-0">
                  <div class="p-0 border bg-light">
                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
                    <p>Mistar ukur koi / penggaris ukur koi /
                    bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                  <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
                    <p>Matala Abu Media Filter
                      Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170">
                    <p>Bio Tube Bacteria House
                    Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                    <p>Uniring rubber hose /
                    selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/selang.jpg" alt="selang" class="card-img-top" height="170">
                      <p>Bio Tube Bacteria House
                        Media Filter</p>
                      <p><b>Rp. 90.000</b></p>
                      <div class="col" style="text-align: end">
                        <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                      </div>
                  </div>
                </div>
                <div class="col p-0">
                  <div class="p-0 border bg-light">
                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
                    <p>Mistar ukur koi / penggaris ukur koi /
                    bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                  <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
                    <p>Matala Abu Media Filter
                      Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170">
                    <p>Bio Tube Bacteria House
                    Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                    <p>Uniring rubber hose /
                    selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/selang.jpg" alt="selang" class="card-img-top" height="170">
                      <p>Bio Tube Bacteria House
                        Media Filter</p>
                      <p><b>Rp. 90.000</b></p>
                      <div class="col" style="text-align: end">
                        <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                      </div>
                  </div>
                </div>
                <div class="col p-0">
                  <div class="p-0 border bg-light">
                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
                    <p>Mistar ukur koi / penggaris ukur koi /
                    bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                  <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
                    <p>Matala Abu Media Filter
                      Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170">
                    <p>Bio Tube Bacteria House
                    Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                    <p>Uniring rubber hose /
                    selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/selang.jpg" alt="selang" class="card-img-top" height="170">
                      <p>Bio Tube Bacteria House
                        Media Filter</p>
                      <p><b>Rp. 90.000</b></p>
                      <div class="col" style="text-align: end">
                        <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                      </div>
                  </div>
                </div>
                <div class="col p-0">
                  <div class="p-0 border bg-light">
                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
                    <p>Mistar ukur koi / penggaris ukur koi /
                    bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                  <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
                    <p>Matala Abu Media Filter
                      Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-makanan" role="tabpanel" aria-labelledby="v-pills-makanan-tab">
              <div class="container mt-3">
              <h5><b>Fish Food</b></h5>
              </div>
              <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170">
                    <p>Bio Tube Bacteria House
                    Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                    <p>Uniring rubber hose /
                    selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/selang.jpg" alt="selang" class="card-img-top" height="170">
                      <p>Bio Tube Bacteria House
                        Media Filter</p>
                      <p><b>Rp. 90.000</b></p>
                      <div class="col" style="text-align: end">
                        <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                      </div>
                  </div>
                </div>
                <div class="col p-0">
                  <div class="p-0 border bg-light">
                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
                    <p>Mistar ukur koi / penggaris ukur koi /
                    bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                  <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
                    <p>Matala Abu Media Filter
                      Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-alat" role="tabpanel" aria-labelledby="v-pills-alat-tab">
              <div class="container mt-3">
              <h5><b>Fish Equipment</b></h5>
              </div>
              <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/bio_media.png" alt="bio media" class="card-img-top" height="170">
                    <p>Bio Tube Bacteria House
                    Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
                    <p>Uniring rubber hose /
                    selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/selang.jpg" alt="selang" class="card-img-top" height="170">
                      <p>Bio Tube Bacteria House
                        Media Filter</p>
                      <p><b>Rp. 90.000</b></p>
                      <div class="col" style="text-align: end">
                        <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                      </div>
                  </div>
                </div>
                <div class="col p-0">
                  <div class="p-0 border bg-light">
                    <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
                    <p>Mistar ukur koi / penggaris ukur koi /
                    bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                  <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
                    <p>Matala Abu Media Filter
                      Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-ikan" role="tabpanel" aria-labelledby="v-pills-ikan-tab">
              <div class="container mt-3">
              <h5><b>Fish</b></h5>
              </div>
              <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/koi_3.jpg" alt="bio media" class="card-img-top" height="170">
                    <p>Bio Tube Bacteria House
                    Media Filter</p>
                    <p><b>Rp. 1.300.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/koi_2.jpg" alt="uniring" class="card-img-top" height="170">
                    <p>Uniring rubber hose /
                    selang aerasi</p>
                    <p><b>Rp. 580.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                    <img src="img/koi_3.jpg" alt="selang" class="card-img-top" height="170">
                      <p>Bio Tube Bacteria House
                        Media Filter</p>
                      <p><b>Rp. 90.000</b></p>
                      <div class="col" style="text-align: end">
                        <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                      </div>
                  </div>
                </div>
                <div class="col p-0">
                  <div class="p-0 border bg-light">
                    <img src="img/koi_3.jpg" alt="bak_ukur" class="card-img-top" height="170">
                    <p>Mistar ukur koi / penggaris ukur koi /
                    bak ukur</p>
                    <p><b>Rp. 600.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="p-0 border bg-light">
                  <img src="img/koi_2.jpg" alt="matala" class="card-img-top" height="170">
                    <p>Matala Abu Media Filter
                      Mekanik</p>
                    <p><b>Rp. 974.000</b></p>
                    <div class="col" style="text-align: end">
                      <button><i class="far fa-heart"></i> <span>Wishlist</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>








@endsection
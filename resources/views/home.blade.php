@extends('layout.main')

@section('container')
<div class="container-fluit" style="background-color:red;" heigh="25vh">
  <img src="img/Frame.png" class="d-block w-100" alt="Frame" >
</div>

    <div class="container mt-3 mt-lg mt-lg-5">
    <h5><b>Next event</b></h5>
    </div>

<div class="container">
  <div class="row">
    @php
        $auctionProducts = $nextAuction->auctionProducts ?? [];
    @endphp
    @forelse($auctionProducts as $auctionProduct)
        <div class="col-6 col-lg-3">
        <div class="card modal-header">
            @php
                $photo = 'img/koi.jpg';
                if ($auctionProduct->photo !== null)
                {
                    $photo = $url('storage/') . $auctionProduct->photo->path_foto;
                }
            @endphp
            <img src="{{ $photo }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">{{ $auctionProduct->variety }} |   {{ $auctionProduct->breeder }} | Pedigree | {{ $auctionProduct->size }} | {{ $auctionProduct->bloodline }}</h5>
            <p class="card-text ma" >Starting Price</p>
            <p style="color :red">Rp. {{ $auctionProduct->ob }}</p>
            </div>
        </div>
        </div>
    @empty
    @endforelse
    <!-- <div class="col-6 col-lg-3">
      <div class="card modal-header">
        <img src="img/koi.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
          <p class="card-text ma" >Starting Price</p>
          <p style="color :red">Rp. 5.500.000</p>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card modal-header">
        <img src="img/koi.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
          <p class="card-text ma" >Starting Price</p>
          <p style="color :red">Rp. 8.500.000</p>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card modal-header">
        <img src="img/koi.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Jenis ikan | Parent Fish | Pedigree | Size | Farm</h5>
          <p class="card-text ma" >Starting Price</p>
          <p style="color :red">Rp. 4.500.000</p>
        </div>
      </div>
    </div> -->
  </div>
</div>

<div class="container mt-5">
  <h5><b>Hot Product</b></h5>
</div>

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

</style>

<div class="container nav-atas">
  <div class="d-flex overflow-scroll">
    @forelse($hotProductStores as $hotProduct)
        @php
            $productPhoto2 = 'img/bio_media.png';

            if ($hotProduct->photo !== null) {
                $productPhoto2 = url('storage').'/'.$hotProduct->photo->path_foto;
            }
        @endphp
        <div class="">
            <div class="p-3 border bg-light" style="width: 200px;/* height: 200px; */">
                <a href="/login">
                <img src="img/bio_media.png" alt="bio media" class="card-img-top" style=" height: 166;width: 166;">
                </a>
                <p>{{ "$hotProduct->merek_produk $hotProduct->nama_produk" }}</p>
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

    <!-- <div class="">
      <div class="p-3 border bg-light" style="width: 200px;/* height: 200px; */">
        <a href="/login">
          <img src="img/bio_media.png" alt="bio media" class="card-img-top" style=" height: 166;width: 166;">
        </a>
        <p>Bio Tube Bacteria House
        Media Filter</p>
        <p><b>Rp. 1.300.000</b></p>
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
    <div class="">
      <div class="p-3 border bg-light" style="width: 200px">
        <a href="/login">
        <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" style=" height: 166;width: 166;">
        </a>
        <p>Uniring rubber hose /
        selang aerasi</p>
        <p><b>Rp. 580.000</b></p>
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
    <div class="">
      <div class="p-3 border bg-light" style="width: 200px">
        <a href="/login">
        <img src="img/selang.jpg" alt="selang" class="card-img-top" style="width: 166px;height: 166px;">
        </a>
        <p>Bio Tube Bacteria House
          Media Filter</p>
        <p><b>Rp. 90.000</b></p>
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
    <div class="">
      <div class="p-3 border bg-light" style="width: 200px">
        <a href="/login">
        <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" style=" height: 166;width: 166;">
        </a>
        <p>Mistar ukur koi /
        bak ukur</p>
        <p><b>Rp. 600.000</b></p>
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
    <div class="">
      <div class="p-3 border bg-light" style="width: 200px">
        <a href="/login">
        <img src="img/Matala.jpg" alt="matala" class="card-img-top" style=" height: 166;width: 166;">
        </a>
        <p>Matala Abu Media Filter
          Mekanik</p>
        <p><b>Rp. 974.000</b></p>
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
    </div> -->
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
      <!-- <div class="col">
        <div class="p-3 border bg-light">
          <img src="img/uniring.jpeg" alt="uniring" class="card-img-top" height="170">
          <p>Uniring rubber hose /
          selang aerasi</p>
          <p><b>Rp. 580.000</b></p>
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
      <div class="col">
        <div class="p-3 border bg-light">
        <img src="img/selang.jpg" alt="selang" class="card-img-top" height="170">
          <p>Bio Tube Bacteria House
            Media Filter</p>
          <p><b>Rp. 90.000</b></p>
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
      <div class="col">
        <div class="p-3 border bg-light">
          <img src="img/bak_ukur.jpg" alt="bak_ukur" class="card-img-top" height="170">
          <p>Mistar ukur koi /
          bak ukur</p>
          <p><b>Rp. 600.000</b></p>
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
      <div class="col">
        <div class="p-3 border bg-light">
        <img src="img/Matala.jpg" alt="matala" class="card-img-top" height="170">
          <p>Matala Abu Media Filter
            Mekanik</p>
          <p><b>Rp. 974.000</b></p>
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
      </div> -->
    </div>
  </div>
</div>

<div class="container mt-5 text-center">
  <h3>ONELITO <span style="color:red;">KOI</span></h3>
  <br>
</div>
<div class="container">
  <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua.</p>
  <p class="text-center">Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur.</p>

<p class="text-center mb-5">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<div class="container">
  <div class="justify-content-around row">
    <div class="card col-md-3 col-sm-12 mt-3">
      <div class="card-body">
        <p class="style text-center"><i class="fa-solid fa-envelope" style="color: red"></i></p>
        <p class="style text-center"><b>Email</b></p>
        <p class="style text-center">onelito@gmail.com</p>
      </div>
    </div>
    <div class="card col-md-3 col-sm-12 mt-3">
      <div class="card-body">
        <p class="style text-center"><i class="fas fa-map-marker-alt" style="color: red"></i></p>
        <p class="style text-center"><b>Address</b></p>
        <p class="style text-center">Jl. Tandon Ciater D No. 50, BSD, Ciater, Serpong Sub-District, South Tangerang City Banten 15310</p>
      </div>
    </div>
    <div class="card col-md-3 col-sm-12 mt-3">
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
        <div class="col-lg-3 col-6">
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

    <!-- <div class="col-lg-3 col-6">
      <div class="card modal-header">
        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
          <div class="m-2 me-auto">
          <h5 class="card-title">32nd Champion</h5>
          <p class="card-text ma" >Tahun : 2015</p>
          <p >Size : 50 cm</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="card modal-header">
        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
        <div class="m-2 me-auto">
          <h5 class="card-title">32nd Champion</h5>
          <p class="card-text ma" >Tahun : 2015</p>
          <p >Size : 50 cm</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="card modal-header">
        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
        <div class="m-2 me-auto">
          <h5 class="card-title">32nd Champion</h5>
          <p class="card-text ma" >Tahun : 2015</p>
          <p >Size : 50 cm</p>
        </div>
      </div>
    </div> -->
  </div>
</div>

<div class="container my-5">
  <a href="/login" style="color: red">Lihat lebih Banyak >></a>
</div>


@endsection

</body>
</html>

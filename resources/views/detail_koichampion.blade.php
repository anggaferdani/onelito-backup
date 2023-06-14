@extends('layout.main')

@section('container')
    <style>
        .cb-judul {
            height: 4rem;

        }
    </style>
    <br><br><br><br><br>
    <div class="container">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-5">
            @forelse ($championFishes as $fish)
                <div class="col mt-3">
                    <div class="card">
                        <img src="img/koi12.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <div class="cb-judul">
                                <h5 class="card-title">
                                    {!! Illuminate\Support\Str::limit("$fish->nama_champion", 30) !!}
                                </h5>
                            </div>
                            <p class="card-text ma">Tahun : {{ $fish->tahun }}</p>
                            <p>Size : {{ $fish->size }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse

            <!-- <div class="col-lg-3 col-6 mt-3">
                    <div class="card modal-header">
                        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">32nd Champion</h5>
                            <p class="card-text ma">Tahun : 2015</p>
                            <p>Size : 50 cm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3">
                    <div class="card modal-header">
                        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">32nd Champion</h5>
                            <p class="card-text ma">Tahun : 2015</p>
                            <p>Size : 50 cm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3">
                    <div class="card modal-header">
                        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">32nd Champion</h5>
                            <p class="card-text ma">Tahun : 2015</p>
                            <p>Size : 50 cm</p>
                        </div>
                    </div>
                </div> -->
        </div>
        <!-- <div class="row ">
                <div class="col-lg-3 col-6 mt-3">
                    <div class="card modal-header">
                        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">32nd Champion</h5>
                            <p class="card-text ma">Tahun : 2015</p>
                            <p>Size : 50 cm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3">
                    <div class="card modal-header">
                        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">32nd Champion</h5>
                            <p class="card-text ma">Tahun : 2015</p>
                            <p>Size : 50 cm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3">
                    <div class="card modal-header">
                        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">32nd Champion</h5>
                            <p class="card-text ma">Tahun : 2015</p>
                            <p>Size : 50 cm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3">
                    <div class="card modal-header">
                        <img src="img/koi_2.jpg" class="card-img-top" alt="...">
                        <div class="m-2 me-auto">
                            <h5 class="card-title">32nd Champion</h5>
                            <p class="card-text ma">Tahun : 2015</p>
                            <p>Size : 50 cm</p>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
    <br><br>
@endsection

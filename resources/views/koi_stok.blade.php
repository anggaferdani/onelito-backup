@extends('layout.main')

@section('container')
    <style>
        .cb-judul {
            height: 4rem;
        }

        @media screen and (max-width: 600px) {
            .nav-samping {
                display: none;
            }

        }
    </style>


<br><br><br><br>

    <div class="container-fluit">
        <div class="container">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-5">
                @forelse($fishes as $fish)
                    @php
                        $photo = 'img/koi_3.jpg';
                    @endphp

                    <div class="col mt-5">
                        <div class="card">
                            <img src="{{$photo}}" class="card-img-top" alt="...">
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
                                        <a href="{{ url('koi_stok') .'/'. $fish->id_koi_stock }}"
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
            <div class="btn-toolbar my-3 justify-content-end" role="toolbar"
                aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <a href="{{ $fishes->previousPageUrl() }}"><button  type="button" class="btn btn-danger">Prev</button></a>
                </div>
                    @foreach ($fishes->onEachSide(0)->links()->elements as $elements)
                        @if (is_array($elements))
                            @foreach ($elements as $key => $element)
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <a href="?page={{ $key }}"><button  type="button" class="btn btn-danger {{ (request()->page ?? 1) == $key ? 'active disabled' : '' }}"">{{ $key }}</button></a>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <a href="{{ $fishes->nextPageUrl() }}"><button  type="button" class="btn btn-danger">Next</button></a>
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

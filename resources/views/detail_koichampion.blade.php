@extends('layout.main')

@section('container')
    <style>
        .cb-judul {
            height: 4rem;

        }
    </style>
    <br><br><br><br><br>
    <div class="container" style="max-width:80%">
        <!-- <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-5"> -->
        <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3 mb-5">
            

            @forelse ($championFishes as $fish)
                @php
                    $photoChampion = 'img/koi12.jpg';

                    if ($fish->foto_ikan !== null) {
                        $photoChampion = url('storage') . '/' . $fish->foto_ikan;
                    }
                @endphp
                <div class="col col-md-4 col-lg-3 col-sm-6 mt-3">
                    <div class="card">
                        <img height="465" width="365" src="{{ $photoChampion }}" class="card-img-top" alt="...">
                        <div class="m-2 me-auto d-none">
                            <div class="cb-judul">
                                <h5 class="card-title">
                                    {!! Illuminate\Support\Str::limit("$fish->nama_champion", 30) !!}
                                </h5>
                            </div>
                            <!-- <p class="card-text ma">Tahun : {{ $fish->tahun }}</p> -->
                            <!-- <p>Size : {{ $fish->size }}</p> -->
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <br><br>
@endsection

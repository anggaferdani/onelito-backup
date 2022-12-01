@extends('layout.main')

@section('container')
    <div class="container my-4">
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

            .nav-pills .nav-link.active,
            .nav-pills .show>.nav-link {
                color: #fff;
                background-color: #F0F0F0;
            }

            .cart {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                flex-direction: column;
            }

            .cb-judul {
                height: 3.5rem;

            }
        </style>
        <div class="row gx-3">
            {{-- On screens that are 992px or less, set the display on --}}
            <div class="col-3 nav-samping">
                <div class="">
                    <div class="card text-dark bg-light mb-3 position-fixed" style="max-width: 18rem;">
                        <div class="card-header"><i class='bx bx-menu-alt-left'></i> Etalase Toko</div>
                        <div class="card-body">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active bg-tranparent text-body m-2" style="text-align:left"
                                    id="v-pills-Semua-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Semua"
                                    type="button" role="tab" aria-controls="v-pills-Semua" aria-selected="true">All
                                    Product</button>
                                <button class="nav-link bg-tranparent text-body m-2" style="text-align:left"
                                    id="v-pills-makanan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-makanan"
                                    type="button" role="tab" aria-controls="v-pills-makanan" aria-selected="false">Fish
                                    Food</button>
                                <button class="nav-link bg-tranparent text-body m-2" style="text-align:left"
                                    id="v-pills-alat-tab" data-bs-toggle="pill" data-bs-target="#v-pills-alat"
                                    type="button" role="tab" aria-controls="v-pills-alat" aria-selected="false">Fish
                                    Equipment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- On screens that are 600px or less, set the display none --}}
            <div class="container nav-atas overflow-auto">
                <div class="d-flex nav nav-pills" style="width: 115vw" id="v-pills-tab" role="tablist">
                    <button type="button" class="btn btn-outline-secondary rounded-pill mr-2"><i
                            class='bx bx-menu-alt-left'></i> Filter</button>
                    <button type="button" class="btn btn-outline-secondary rounded-pill mr-2" id="v-pills-Semua-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-Semua" type="button" role="tab"
                        aria-controls="v-pills-Semua" aria-selected="true">All Product</button>
                    <button type="button" class="btn btn-outline-secondary rounded-pill mr-2" id="v-pills-makanan-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-makanan" type="button" role="tab"
                        aria-controls="v-pills-makanan" aria-selected="false">Fish Food</button>
                    <button type="button" class="btn btn-outline-secondary rounded-pill mr-2" id="v-pills-alat-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-alat" type="button" role="tab"
                        aria-controls="v-pills-alat" aria-selected="false">Fish Equipment</button>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-Semua" role="tabpanel"
                            aria-labelledby="v-pills-Semua-tab">
                            <div class="container mt-3">
                                <h5><b>All Product</b></h5>
                            </div>
                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                @forelse ($products as $product)
                                    @php
                                        $productPhoto = 'img/bio_media.png';
                                        
                                        if ($product->photo !== null) {
                                            $productPhoto = url('storage') . '/' . $product->photo->path_foto;
                                        }

                                        $wishlistClass = 'far fa-heart';

                                        if ($product->wishlist !== null) {
                                            $wishlistClass = 'fas fa-heart';
                                        }
                                    @endphp
                                    <div class="col">
                                        <div class="p-0 border bg-light cart">
                                            <a href="/onelito_store/{{ $product->id_produk }}"><img
                                                    src="{{ $productPhoto }}" alt="bio media" class="card-img-top"
                                                    height="170"></a>
                                            <div class="container px-2">
                                                <div class="cb-judul">
                                                    <p>{!! Illuminate\Support\Str::limit("$product->merek_produk $product->nama_produk", 25) !!}</p>
                                                </div>
                                                <p><b>Rp. {{ $product->harga }}</b></p>
                                            </div>
                                            <div class="col px-2 mb-2" style="text-align: end">
                                                <button class="border rounded-1 text-black-50"
                                                style="background-color: transparent;font-size:small"><i
                                                    data-id="{{ $product->id_produk }}"
                                                    class="{{$wishlistClass}} wishlist produk-{{ $product->id_produk }}"></i> <span>Wishlist</span></button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
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
                        </div>
                        <div class="tab-pane fade" id="v-pills-makanan" role="tabpanel"
                            aria-labelledby="v-pills-makanan-tab">
                            <div class="container mt-3">
                                <h5><b>Fish Food</b></h5>
                            </div>
                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                @forelse ($products->where('id_kategori_produk', 2) as $fishfoodProduct)
                                    @php
                                        $productPhoto2 = 'img/uniring.jpeg';
                                        
                                        if ($fishfoodProduct->photo !== null) {
                                            $productPhoto2 = url('storage') . '/' . $fishfoodProduct->photo->path_foto;
                                        }

                                        $wishlistClass = 'far fa-heart';

                                        if ($fishfoodProduct->wishlist !== null) {
                                            $wishlistClass = 'fas fa-heart';
                                        }
                                    @endphp
                                    <div class="col">
                                        <div class="p-0 border bg-light cart">
                                            <a href="/onelito_store/{{ $fishfoodProduct->id_produk }}"><img
                                                    src="{{ $productPhoto2 }}" alt="bio media" class="card-img-top"
                                                    height="170"></a>
                                            <div class="container px-2">
                                                <div class="cb-judul">
                                                    <p>{!! Illuminate\Support\Str::limit("$fishfoodProduct->merek_produk $fishfoodProduct->nama_produk", 25) !!}</p>
                                                </div>
                                                <p><b>Rp. {{ $fishfoodProduct->harga }}</b></p>
                                            </div>
                                            <div class="col px-2 mb-2" style="text-align: end">
                                                <button class="border rounded-1 text-black-50"
                                                    style="background-color: transparent;font-size:small"><i
                                                        data-id="{{ $fishfoodProduct->id_produk }}"
                                                        class="{{ $wishlistClass }} wishlist produk-{{ $fishfoodProduct->id_produk }}"></i> <span>Wishlist</span></button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
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
                        </div>
                        <div class="tab-pane fade" id="v-pills-alat" role="tabpanel" aria-labelledby="v-pills-alat-tab">
                            <div class="container mt-3">
                                <h5><b>Fish Equipment</b></h5>
                            </div>
                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">

                            @forelse ($products->where('id_kategori_produk', 1) as $fishgearProduct)
                                @php
                                    $productPhoto3 = 'img/selang.jpg';

                                    if ($fishgearProduct->photo !== null) {
                                        $productPhoto3 = url('storage').'/'.$fishgearProduct->photo->path_foto;
                                    }
                                    $wishlistClass = 'far fa-heart';

                                    if ($fishgearProduct->wishlist !== null) {
                                        $wishlistClass = 'fas fa-heart';
                                    }
                                @endphp
                                <div class="col">
                                    <div class="p-0 border bg-light cart">
                                        <a href="/onelito_store/{{ $fishgearProduct->id_produk }}"><img src="{{ $productPhoto2 }}" alt="bio media"
                                                class="card-img-top" height="170"></a>
                                        <div class="container px-2">
                                            <div class="cb-judul">
                                                <p>{!! Illuminate\Support\Str::limit("$fishgearProduct->merek_produk $fishgearProduct->nama_produk", 25) !!}</p>
                                            </div>
                                            <p><b>Rp. {{ $fishgearProduct->harga }}</b></p>
                                        </div>
                                        <div class="col px-2 mb-2" style="text-align: end">
                                            <button class="border rounded-1 text-black-50"
                                                style="background-color: transparent;font-size:small"><i
                                                    data-id="{{ $fishgearProduct->id_produk }}"
                                                    class="{{$wishlistClass}} wishlist produk-{{ $fishgearProduct->id_produk }}"></i> <span>Wishlist</span></button>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.wishlist',function(e) {
            var element = $(e.currentTarget);
            var elClass = element.attr('class');
            var targetClass = elClass.substr(0, 21);
            var idClass = elClass.substr(22);
            var id = element.attr('data-id');
            var targetElements = $(`.${idClass}`)

            if (targetClass === 'far fa-heart wishlist') {
                $.ajax({
                    type: 'POST',
                    url : `wishlists`,
                    data: {
                        id_produk: id
                    },
                    dataType: "json",
                    success: function(res) {
                        $.map(targetElements, function (item) {
                            $(item).attr('class', `fas fa-heart wishlist ${idClass}`);
                        })

                        return true;
                    },
                    error:function(error) {
                        console.log(error)
                        return false
                    }

                })
            }

            if (targetClass === 'fas fa-heart wishlist') {
                $.ajax({
                    type: 'DELETE',
                    url : `wishlists/${id}`,
                    data: {
                        id_produk: id
                    },
                    dataType: "json",
                    success: function(res) {
                        $.map(targetElements, function (item) {
                            $(item).attr('class', `far fa-heart wishlist ${idClass}`);
                        })

                        return true;
                    },
                    error:function(error) {
                        console.log(error)
                        return false
                    }
                })
            }
        })
</script>
@endpush

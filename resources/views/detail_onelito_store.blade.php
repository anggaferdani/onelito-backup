@extends('layout.main')

@section('container')
<br><br><br><br>
    <div class="container">
        <br>
        <a href="/onelito_store"><i class="fa-solid fa-arrow-left-long text-body"></i></a>
        <br><br>

        <div class="container">
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
            @php
                $imgUrl = 'img/bio_media.png';

                if ($product->photo !== null) {
                    $imgUrl = 'storage/' . $product->photo->path_foto;
                }
            @endphp
            <div class="nav-atas">

                <div class=>
                    <img src="{{ url($imgUrl) }}" alt="bio media" class="w-100">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-10">
                                <p>{{ "$product->merek_produk $product->nama_produk" }}</p>
                            </div>
                            <div class="col-2">
                                <i class="far fa-heart m-3" style="font-size:large"></i>
                            </div>
                        </div>

                        <h2>Rp. {{ $product->harga }}</h2>
                        <hr>
                        <p class="alert-link text-danger">Detail</p>
                        <p>{{ $product->deskripsi }}</p>
                    </div>
                    <div>
                        <h5 class="card-title">Ordered quantity</h5>

                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-light"><i class="fa-solid fa-minus"></i></button>
                            <button type="button" class="btn btn-light">1</button>
                            <button type="button" class="btn btn-light"><i class="fa-solid fa-plus"></i></button>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h6 class="my-md-2 text-muted">Subtotal</h6>
                            </div>
                            <div class="col">
                                <p>Rp 1.300.000</p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success w-100 justify-content-between mb-xl-2">Order
                            Now</button>
                        <div class="row gx-5 mt-3">
                            <div class="col">
                                <button type="button" class="btn btn-success w-100 justify-content-between text-success"
                                    style="background-color: white">Add Cart</button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success w-100 justify-content-between text-success"
                                    style="background-color: white">Wishlist</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-samping">
                <div class="row">
                    <div class="col">
                        <img src="{{ url($imgUrl) }}" alt="bio media" class="w-100">
                    </div>
                    <div class="col">
                        <p style="font-size: 35px">{{ "$product->merek_produk $product->nama_produk" }}</p>
                        <h2>Rp {{ number_format($product->harga, 0, '.', '.') }}</h2>
                        <hr>
                        <p class="alert-link text-danger">Detail</p>
                        <p>{{ $product->deskripsi }}</p>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Ordered quantity</h5>

                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" id="subtract" class="btn btn-light"><i
                                            class="fa-solid fa-minus"></i></button>
                                    <button type="button" id="output" class="btn btn-light">1</button>
                                    <button type="button" id="add" class="btn btn-light"><i
                                            class="fa-solid fa-plus"></i></button>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h6 class="my-md-2 text-muted">Subtotal</h6>
                                    </div>
                                    <div class="col">
                                        <p id="total_price">Rp {{ number_format($product->harga, 0, '.', '.') }}</p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success w-100 justify-content-between mb-xl-2">Order
                                    Now</button>
                                <div class="row gx-5">
                                    <div class="col">
                                        <button type="button"
                                            id="addcart"
                                            class="btn btn-success w-100 justify-content-between text-success"
                                            style="background-color: white">Add Cart</button>
                                    </div>
                                    <div class="col">
                                        <button type="button"
                                            class="btn btn-success w-100 justify-content-between text-success"
                                            style="background-color: white">Wishlist</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
@endsection
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let add = document.querySelector("#add");
        let output = Number(document.querySelector("#output").innerText);

        let productId = Number('{{ $product->id_produk }}');
        let originPrice = Number('{{ $product->harga }}');

        // output * originPrice
        let totalPrice = Number('{{ $product->harga }}');

        add.addEventListener("click", function() {
            let output = document.querySelector("#output");
            let result = Number(output.innerText) + 1;
            var priceTotal = originPrice * result;

            output.innerText = result;
            document.querySelector("#total_price").innerText = "Rp "+thousandSeparator(priceTotal);
        });

        let kurang = document.querySelector("#subtract");

        kurang.addEventListener("click", function() {
            let output = document.querySelector("#output");
            let result = Number(output.innerText) - 1;

            if (result < 1) {
                result = 1
            }

            var priceTotal = originPrice * result;
            output.innerText = result;
            document.querySelector("#total_price").innerText = "Rp "+thousandSeparator(priceTotal);

        });

        $(document).on('click', '#addcart', function(e) {
            var button = $(this);
            $(this).attr('disabled', true)
            var output = document.querySelector("#output");
            $.ajax({
                type: 'POST',
                url: `/carts`,
                data: {
                    jumlah: Number(output.innerText),
                    cartable_id: productId,
                    cartable_type: 'Product',
                },
                dataType: "json",
                complete: function(res) {
                    document.location = '/profil?section=cart'
                    // element.attr('class', 'fas fa-heart wishlist');
                    button.removeAttr('disabled')
                },
                error: function(error) {
                    console.log(error)
                    return false
                }
            })
        });

        function thousandSeparator(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>
@endpush

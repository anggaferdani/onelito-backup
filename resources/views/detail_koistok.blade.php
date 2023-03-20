@extends('layout.main')

@section('container')
<br><br><br><br>
<br>

@php
@endphp

    <div class="container">
        <a href="/koi_stok"><i class="fa-solid fa-arrow-left-long text-body" style="font-size: x-large"></i></a>

        <style>
            /* On screens that are 992px or less, set the background color to blue */
            @media screen and (min-width: 601px) {
                .res {
                    display: none
                }
            }

            /* On screens that are 600px or less, set the background color to olive */
            @media screen and (max-width: 600px) {
                .web {
                    display: none;
                }
            }
        </style>



        <div class="res">
            <div class="row">
                <div class="col-6">
                    <div class="">
                        <img src="{{ url('/img/koi_3.jpg') }}" class="card-img-top" alt="...">
                        <br><br>
                    </div>
                    <!-- <div>
                        <a class="btn btn-danger mb-3 d-block" href="/bid" style="font-size: 12px" role="button">VIDEO <span><i
                            class="fa-solid fa-circle-chevron-right"></i></span></a>
                    </div> -->
                </div>
                <div class="col-6 ps-0">
                    <p class="m-0" style="font-size: 11px">Detail Koi</p>
                    <hr class="m-0">
                    <h3 style="font-size: 12px">
                        <table>
                            <tr>
                                <td>Variety</td>
                                <td>: {{ $fish->variety }}</td>
                            </tr>
                            <tr>
                                <td>Breeder</td>
                                <td>: {{ $fish->breeder }}</td>
                            </tr>
                            <tr>
                                <td>Bloodline</td>
                                <td>: {{ $fish->bloodline }}</td>
                            </tr>
                            <tr>
                                <td>Sex</td>
                                <td>: {{ $fish->sex }}</td>
                            </tr>
                            <tr>
                                <td>DOB</td>
                                <td>: {{ $fish->dob }}</td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td>: {{ $fish->size }}</td>
                            </tr>
                        </table>
                    </h3>

                    <!-- <hr class="m-0">

                    <p class="m-0" style="font-size: 11px">Note :</p>
                    <p style="font-size: 10px">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum,
                        voluptas! Porro suscipit obcaecati eius quia qui dolorem harum ipsam, illo laudantium officiis
                        maiores commodi aliquid fugiat, laboriosam ipsa similique blanditiis.</p>

                    <hr class="m-0"> -->

                    <p class="" style="font-size:11px">Harga : <span class="alert-link text-danger"
                            style="font-size:12px">Rp {{ number_format($fish->harga_ikan, 0, '.', '.') }}</span></p>


                    <hr class="m-0">
                    <a class="btn btn-danger float-end mb-3 mt-3" href="#" role="button">Question <span><i
                        class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>

        <div class="web">
            <div class="row gx-5">
                <div class="col-3">
                    <div class="m-lg-auto">
                        <img src="{{ url('img/koi_3.jpg') }}" class="card-img-top" alt="...">
                        <br><br>
                        <!-- <div class="card-body p-0">
                            <a href="#" class="btn btn-danger w-100 d-flex justify-content-between"
                                style="font-size:larger">VIDEO <span><i
                                        class="fa-solid fa-circle-chevron-right"></i></span></a>
                        </div> -->
                    </div>
                </div>
                <div class="col-9">
                    <p style="font-size: larger">Detail Koi</p>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <h3>
                                <table>
                                    <tr>
                                        <td>Variety</td>
                                        <td>: {{ $fish->variety }}</td>
                                    </tr>
                                    <tr>
                                        <td>Breeder</td>
                                        <td>: {{ $fish->breeder }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bloodline</td>
                                        <td>: {{ $fish->bloodline }}</td>
                                    </tr>
                                </table>
                            </h3>
                        </div>
                        <div class="col">
                            <h3>
                                <table>
                                    <tr>
                                        <td>Sex</td>
                                        <td>: {{ $fish->sex }}</td>
                                    </tr>
                                    <tr>
                                        <td>DOB</td>
                                        <td>: {{ $fish->dob }}</td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td>: {{ $fish->size }}</td>
                                    </tr>
                                </table>
                            </h3>
                        </div>
                    </div>

                    <!-- <hr>

                    <p class="m-0" style="font-size: larger">Note :</p>
                    <p style="font-size: larger">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum,
                        voluptas! Porro suscipit obcaecati eius quia qui dolorem harum ipsam, illo laudantium officiis
                        maiores commodi aliquid fugiat, laboriosam ipsa similique blanditiis.</p>
                    <hr> -->

                    <p style="font-size:30px">Harga : <span class="alert-link text-danger">Rp {{ number_format($fish->harga_ikan, 0, '.', '.') }}</span></p>
                    <hr>

                    <br><br>
                    <div class="float-end">
                        <a class="btn btn-danger mb-3" href="#" role="button">Question <span><i
                                    class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br>
    </div>
@endsection

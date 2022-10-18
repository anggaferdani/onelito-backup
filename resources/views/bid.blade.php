@extends('layout.mainlog')

@section('container')
<div class="container w-75">
    <a href="/auctionlog"><i class="fa-solid fa-arrow-left-long text-body" style="font-size: x-large"></i></a>
</div>

<div class="container px-4">
    <div class="row gx-5">
        <div class="col-4">
                <div class="m-lg-auto" style="width: 18rem;">
                    @php
                        $imgUrl = 'img/koi_3.jpg';

                        if ($auctionProduct->photo) {
                            $imgUrl = 'storage/'. $auctionProduct->photo->path_foto;
                        }
                    @endphp
                    <img src="{{ url($imgUrl) }}" class="card-img-top" alt="...">
                    <br><br>
                    <a target="_blank" href="{{ $auctionProduct->link_video }}" class="btn btn-danger w-100 d-flex justify-content-between" style="font-size:larger">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                </div>
        </div>
        <div class="col-8">
            <p style="font-size: larger">Auction Detail</p>
            <hr>
            <div class="row">
                <div class="col">
                <h3><table>
                    <tr>
                        <td>Variety</td>
                        <!-- <td>: Kohaku</td> -->
                        <td>: {{ $auctionProduct->variety }}</td>
                    </tr>
                    <tr>
                        <td>Breeder</td>
                        <!-- <td>: Sakai Fish Farm</td> -->
                        <td>: {{ $auctionProduct->breeder }}</td>
                    </tr>
                    <tr>
                        <td>Bloodline</td>
                        <!-- <td>: S Legend</td> -->
                        <td>: {{ $auctionProduct->bloodline }}</td>
                    </tr>
                </table></h3>
                </div>
                <div class="col">
                <h3><table>
                    <tr>
                        <td>Sex</td>
                        <!-- <td>: Female</td> -->
                        <td>: {{ $auctionProduct->sex }}</td>
                    </tr>
                    <tr>
                        <td>DOB</td>
                        <!-- <td>: 2020</td> -->
                        <td>: {{ $auctionProduct->dob }}</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <!-- <td>: 57 cm</td> -->
                        <td>: {{ $auctionProduct->size }}</td>
                    </tr>
                </table></h3>
                </div>
            </div>
            <hr>

            <p class="m-0" style="font-size: larger">Note :</p>
            <p style="font-size: larger">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum, voluptas! Porro suscipit obcaecati eius quia qui dolorem harum ipsam, illo laudantium officiis maiores commodi aliquid fugiat, laboriosam ipsa similique blanditiis.</p>
            <hr>

            <!-- <p style="font-size:30px">Harga saat ini: <span class="alert-link text-danger">Rp 7.500.000</span></p> -->
            @php
                $currentPrice = $auctionProduct->ob;

                $currentPrice = $maxBid > $currentPrice ? $maxBid : $currentPrice;
            @endphp
            <p style="font-size:30px">Harga saat ini: <span class="alert-link text-danger">Rp {{ $currentPrice }}</span></p>
            <hr>

            <!-- <p style="font-size:25px">Kelipatan BID: <span class="alert-link text-danger">Rp 100.000</span></p> -->
            <p style="font-size:25px">Kelipatan BID: <span class="alert-link text-danger">Rp. {{ $auctionProduct->kb }}</span></p>

            <hr>

            <p class="m-0" style="font-size: larger">Countdown</p>
            <p class="alert-link text-danger" style="font-size: 30px">00 : 35 : 45</p>
            <br><br>

            <form method="POST" action="/auction/{{ $idIkan }}" class="row">
                @csrf
                <div class="col-9">
                    <input type="number" name="nominal_bid" value="{{ $logBid->nominal_bid ?? '' }}" class="form-control" id="exampleFormControlInput1" placeholder="Nominal BID">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-danger mb-3 w-100 justify-content-between">BID AUCTION</button>
                </div>
            </form>

            <form class="row">
                <div class="col-9">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nominal Max Auto BID">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-danger mb-3 w-100 justify-content-between">AUTO BID</button>
                </div>
            </form>
        </div>
    </div>
    <br><br><br>
</div>
@endsection

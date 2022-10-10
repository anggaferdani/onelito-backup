@extends('layout.mainlog')

@section('container')
<div class="container w-75">
    <a href="/auctionlog"><i class="fa-solid fa-arrow-left-long text-body"></i></a>
</div>

<div class="container px-4">
    <div class="row gx-5">
        <div class="col-4">           
            <div class="card m-lg-auto" style="width: 18rem;">
                <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="#" class="btn btn-danger w-100 d-flex justify-content-between" style="font-size:larger">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-8">
            <p style="font-size: larger">Auction Detail</p>
            <hr>
            <h3><table>
                <tr>
                    <td>Variety</td>
                    <td>: Kohaku</td>
                </tr>
                <tr>
                    <td>Breeder</td>
                    <td>: Sakai Fish Farm</td>
                </tr>
                <tr>
                    <td>Bloodline</td>
                    <td>: S Legend</td>
                </tr>
                <tr>
                    <td>Sex</td>
                    <td>: Female</td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td>: 2020</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>: 57 cm</td>
                </tr>
            </table></h3>
            <hr>

            <p class="m-0" style="font-size: larger">Note :</p>
            <p style="font-size: larger">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum, voluptas! Porro suscipit obcaecati eius quia qui dolorem harum ipsam, illo laudantium officiis maiores commodi aliquid fugiat, laboriosam ipsa similique blanditiis.</p>
            <hr>

            <p style="font-size:30px">Harga saat ini: <span class="alert-link text-danger">Rp 4.000.000</span></p>
            <hr>

            <p style="font-size:25px">Kelipatan BID: <span class="alert-link text-danger">Rp 50.000</span></p>
            <hr>

            <p class="m-0" style="font-size: larger">Countdown</p>
            <p class="alert-link text-danger" style="font-size: 30px">00 : 35 : 45</p>
            <br><br>
            <div class="col-3">
                <a class="btn btn-danger mb-3" href="/bid4" role="button">BID Now</a>
            </div>
        </div>
    </div>
    <br><br><br>
</div>
@endsection
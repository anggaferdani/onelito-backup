@extends('layout.main')

@section('container')
<div class="container w-75">
    <a href="/auction"><i class="fa-solid fa-arrow-left-long text-body"></i></a>
</div>

<div class="container px-4">
    <div class="row gx-5">
        <div class="col-4">
            {{-- <div class="border bg-light"> --}}
                <div class="m-lg-auto" style="width: 18rem;">
                    <img src="img/koi_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="#" class="btn btn-light w-100 d-flex justify-content-between">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                    </div>
                </div>

            {{-- </div> --}}
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

            <p style="font-size:30px">Current BID: <span class="alert-link text-danger">Rp 7.500.000</span></p>
            <hr>

            <p style="font-size:25px">Kelipatan BID: <span class="alert-link text-danger">Rp 100.000</span></p>
            <hr>

            <p class="m-0" style="font-size: larger">Countdown</p>
            <p class="alert-link text-danger" style="font-size: 30px">00 : 35 : 45</p>
            <br><br>

            <form class="row">
                <div class="col-9">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nominal BID">
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
</div>





@endsection
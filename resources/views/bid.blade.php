@extends('layout.mainlog')

@section('container')
<style>
    .spinner-border {
        width: 1rem;
        height: 1rem;
    }
</style>
<div class="container w-75">
    <a href="/auction"><i class="fa-solid fa-arrow-left-long text-body" style="font-size: x-large"></i></a>
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
            <p style="font-size:30px">Harga saat ini: <span id="currentPrice" class="alert-link text-danger">Rp {{ $currentPrice }}</span></p>
            <hr>

            <!-- <p style="font-size:25px">Kelipatan BID: <span class="alert-link text-danger">Rp 100.000</span></p> -->
            <p style="font-size:25px">Kelipatan BID: <span class="alert-link text-danger">Rp. {{ $auctionProduct->kb }}</span></p>

            <hr>

            <p class="m-0" style="font-size: larger">Countdown</p>
            <p class="alert-link text-danger" style="font-size: 30px">00 : 35 : 45</p>
            <br><br>

            <form method="POST" id="normalBidForm" action="/auction/{{ $idIkan }}" class="row">
                @csrf
                <div class="col-9">
                    <input type="number" id="nominal_bid" name="nominal_bid" value="{{ $logBid->nominal_bid ?? '' }}" class="form-control" id="exampleFormControlInput1" placeholder="Nominal BID">
                </div>
                <div class="col-3">
                    <button id="buttonNormalBid" type="submit" class="btn btn-danger mb-3 w-100 justify-content-between">BID AUCTION</button>
                    <button hidden onclick="cancelAutoBid()" id="buttonCancelAutoBid" type="button" class="btn btn-danger mb-3 w-100 justify-content-between">CANCEL AUTO BID</button>
                </div>
            </form>

            <form method="POST" id="autoBidForm" action="/auction/{{ $idIkan }}"  class="row">
                <div class="col-9">
                    <input type="number" id="auto_bid" name="auto_bid" class="form-control" value="{{ $logBid->auto_bid ?? '' }}" id="exampleFormControlInput1" placeholder="Nominal Max Auto BID">
                </div>
                <div class="col-3">
                    <button type="submit" id="buttonAutoBid" class="btn btn-danger mb-3 w-100 justify-content-between">
                        AUTO BID
                    </button>
                </div>
            </form>
        </div>
    </div>
    <br><br><br>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script type="text/javascript">
    let currentMaxBid = @json($maxBid);
    let nominalBid = @json($logBid);
    let autoBid = @json($autoBid);
    let idIkan = @json($idIkan);
    let auctionProduct = @json($auctionProduct);
    let statusGetMaxBid = false;
    let statusAutoBid = false;
    let meMaxBid = false;

    $('#normalBidForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = $(this).attr('action')

        bidding(formData, url);
    })

    function cancelAutoBid ()
    {
        statusAutoBid = false;
        $('#buttonCancelAutoBid').attr('hidden', 'hidden');
        $('#buttonNormalBid').removeAttr('hidden');
        $('#buttonAutoBid').html(`AUTO BID`)
    }

    $('#autoBidForm').submit(function(e) {
        $('#buttonCancelAutoBid').removeAttr('hidden');
        $('#buttonNormalBid').attr('hidden', 'hidden');
        $('#buttonAutoBid').html(`
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `)
        e.preventDefault();
        let formData = new FormData(this);
        let url = $(this).attr('action')
        let kb = parseInt(auctionProduct.kb);

        let inputNominalBid = parseInt($('#nominal_bid').val());
        let nextNominalBid = (kb + inputNominalBid);

        statusAutoBid = true;

        autoBid = parseInt($('#auto_bid').val());

        formData.append('nominal_bid', nextNominalBid)
        // var interval = setInterval(function(){
        //     if(timesRun === 60){
        //         clearInterval(interval);
        //     }
        //     bidding(formData, url);
        // }, 2000);
        // bidding(formData, url);
    })

    function bidding (formData, url)
    {
        $.ajax({
        type: 'POST',
        data : formData,
        contentType: false,
        processData: false,
        url: url,
        beforeSend:function(){

        },
        complete: function(){
            // console.log({statusAutoBid, autoBid, nominalBid})
            if (statusAutoBid === false) {
                return false;
            }

            let kb = parseInt(auctionProduct.kb);

            let inputNominalBid = parseInt($('#nominal_bid').val());
            let nextNominalBid = (kb + inputNominalBid);

            formData.set('nominal_bid', nextNominalBid)

        },
        success: function(res){
            $('#nominal_bid').val(formData.get('nominal_bid'))
            nominalBid = formData.get('nominal_bid');
            // autoBid = parseInt($('#auto_bid').val());

            // if (nominalBid > currentMaxBid) {
            //     statusAutoBid = false;
            // }
        },
        error(err){

        }
    })
    }

    function autoDetailBid ()
    {
        urlGet = `/auction/${idIkan}/detail`;

        autoBid = parseInt($('#auto_bid').val());

        $.ajax({
        type: 'GET',
        contentType: false,
        processData: false,
        url: urlGet,
        beforeSend:function(){

        },
        complete: function(){
            // console.log({currentMaxBid, autoBid, nominalBid, meMaxBid})
            // setTimeout(() => { autoDetailBid() }, 2000);

            // console.log({statusAutoBid, autoBid, nominalBid})
            if (meMaxBid === true) {
                console.log('meMaxBid')
                return false;
            }

            if (statusAutoBid === false) {
                console.log('statusAutoBid')
                return false;
            }

            if (currentMaxBid > autoBid) {
                console.log('currentMaxBid > autoBid')
                return false;
            }

            // if (nominalBid < currentMaxBid) {
            //     console.log('currentMaxBid > nominalBid')
            //     return false;
            // }

            let formData = new FormData(document.getElementById("autoBidForm"));

            let url = $('#autoBidForm').attr('action')
            let kb = parseInt(auctionProduct.kb);

            let nextNominalBid = (kb + currentMaxBid);

            formData.set('nominal_bid', nextNominalBid)

            bidding(formData, url);
        },

        success: function(res){
            // $('#nominal_bid').val(formData.get('nominal_bid'))
            // nominalBid = formData.get('nominal_bid');
            // autoBid = parseInt($('#auto_bid').val());

            meMaxBid = res.meMaxBid;
            currentMaxBid = parseInt(res.maxBid)
            nominalBid = parseInt(res.logBid.nominal_bid)
            $('#currentPrice').html(`Rp. ${res.maxBid}`);

            // if (nominalBid < currentMaxBid) {
            //     statusAutoBid = true;
            // }
        },
        error(err){

        }
    })
    }

    autoDetailBid();

    </script>
@endpush

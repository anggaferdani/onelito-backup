@extends('layout.mainlog')

@section('container')
    <div class="container">
        <a href="/auction"><i class="fa-solid fa-arrow-left-long text-body" style="font-size: x-large"></i></a>

        <style>
            /* On screens that are 992px or less, set the background color to blue */
            @media screen and (min-width: 601px) {
                /* .res {
                    display: none
                } */
            }

            /* On screens that are 600px or less, set the background color to olive */
            @media screen and (max-width: 600px) {
                /* .web {
                    display: none;
                } */
                hr {
                    margin: 0;
                }

                p {
                    font: size 11px !important;
                    margin-bottom: 0.5rem;
                }

                h3 {
                    font-size: 12px !important;
                    margin-bottom: 0;
                }

                button.btn-danger {
                    font-size: 13px;
                    height: 38px;
                }
            }
        </style>

        <!-- <div class="res">
            <div class="row">
                <div class="col-6">
                    @php
                        $imgUrl = 'img/koi_3.jpg';

                        if ($auctionProduct->photo) {
                            $imgUrl = 'storage/'. $auctionProduct->photo->path_foto;
                        }
                    @endphp
                    <div class="">
                        <img src="{{ url($imgUrl) }}" class="card-img-top" alt="...">
                        <br><br>
                    </div>
                    <div class="card-body p-0">
                        <a target="_blank" href="{{ $auctionProduct->link_video }}" class="btn btn-danger w-100 d-flex justify-content-between"
                            style="font-size:larger">VIDEO <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                    </div>
                </div>
                <div class="col-6 ps-0">
                    <p class="m-0" style="font-size: 11px">Auction Detail</p>
                    <hr class="m-0">
                    <h3 style="font-size: 12px">
                        <table>
                        <tr>
                            <td>Variety</td>
                            <td>: {{ $auctionProduct->variety }}</td>
                        </tr>
                        <tr>
                            <td>Breeder</td>
                            <td>: {{ $auctionProduct->breeder }}</td>
                        </tr>
                        <tr>
                            <td>Bloodline</td>
                            <td>: {{ $auctionProduct->bloodline }}</td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td>: {{ $auctionProduct->sex }}</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>: {{ $auctionProduct->dob }}</td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>: {{ $auctionProduct->size }}</td>
                        </tr>
                        </table>
                    </h3>

                    <hr class="m-0">

                    <p class="m-0" style="font-size: 11px">Note :</p>
                    <p style="font-size: 10px">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum,
                        voluptas! Porro suscipit obcaecati eius quia qui dolorem harum ipsam, illo laudantium officiis
                        maiores commodi aliquid fugiat, laboriosam ipsa similique blanditiis.</p>

                    <hr class="m-0">

                    @php
                        $currentPrice = $auctionProduct->ob;

                        $currentPrice = $maxBid > $currentPrice ? $maxBid : $currentPrice;
                    @endphp

                    <p class="m-0" style="font-size:11px">Harga saat ini: <span class="alert-link text-danger"
                            style="font-size:12px">Rp {{ $currentPrice }}</span></p>

                    <hr class="m-0">

                    <p style="font-size:10px" class="m-0">Kelipatan BID: <span class="alert-link text-danger"
                            style="font-size: 11px">Rp. {{ $auctionProduct->kb }}</span></p>

                    <hr class="m-0">

                    <p class="m-0 mt-2" style="font-size: 13px">Countdown</p>
                    <p class="alert-link text-danger" style="font-size: 16px">00 : 35 : 45</p>
                </div>

                <div class="input-group input-group-sm mb-3 mt-5">
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" placeholder="Nominal BID">
                    <span class="bg-danger input-group-text text-white" id="inputGroup-sizing-sm">BID AUCTION</span>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" placeholder="Nominal Max Auto BID">
                    <span class="bg-danger input-group-text text-white" id="inputGroup-sizing-sm">AUTO BID</span>
                </div>
            </div>
        </div> -->

        <div class="web">
            <div class="row gx-5">
                <div class="col-6 col-md-4">
                    <div class="m-lg-auto" style="max-width: 18rem;">
                    @php
                        $imgUrl = 'img/koi_3.jpg';

                        if ($auctionProduct->photo) {
                            $imgUrl = 'storage/'. $auctionProduct->photo->path_foto;
                        }
                    @endphp
                    <img src="{{ url($imgUrl) }}" class="card-img-top" alt="...">
                        <br><br>
                        <div class="card-body p-0">
                            <a target="_blank" href="{{ $auctionProduct->link_video }}" class="btn btn-danger w-100 d-flex justify-content-between"
                                style="font-size:larger">VIDEO <span><i
                                        class="fa-solid fa-circle-chevron-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-8 ps-0">
                    <p style="font-size: larger">Auction Detail</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h3>
                                <table>
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
                                </table>
                            </h3>
                        </div>
                        <div class="col">
                            <h3>
                                <table>
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
                                </table>
                            </h3>
                        </div>
                    </div>
                    <hr>

                    <p class="m-0" style="font-size: larger">Note :</p>
                    <p style="font-size: larger">{{ $auctionProduct->note }}</p>
                    <hr>

                    <p style="font-size:30px">Harga saat ini: <span id="currentPrice" class="alert-link text-danger number-separator">Rp. {{ $currentPrice }}</span></p>
                    <hr>

                    <p style="font-size:25px">Kelipatan BID: <span class="alert-link text-danger">Rp. {{ $auctionProduct->kb }}</span></p>
                    <hr>

                    <p class="m-0" style="font-size: larger">Countdown</p>
                    <p class="alert-link text-danger countdown-label" style="font-size: 30px">00 : 00 : 00</p>

                    <br><br>
                </div>

                <div class="row m-1">
                    <div class="col-md-4">
                    </div>
                    <div class="col-12 col-md-8 no-gutters">
                        <form method="POST" id="normalBidForm" action="/auction/{{ $idIkan }}" class="row">
                            @csrf
                            <div class="col-7 col-md-9" style="padding-right:0px">
                                <!-- <input type="text" id="nominal_bid2" name="nominal_bid2" value="{{ $logBid->nominal_bid ?? '' }}" class="form-control number-separator" id="exampleFormControlInput1" placeholder="Nominal BID"> -->
                                <input type="text" id="nominal_bid" name="nominal_bid" value="" required class="form-control number-separator" id="exampleFormControlInput1" placeholder="Nominal BID">
                            </div>
                            <div class="col-5 col-md-3" style="padding-left:0px; max-height: 38px">
                                <button id="buttonNormalBid" type="submit" class="btn btn-danger w-100 justify-content-between">BID AUCTION</button>
                                <button hidden onclick="cancelAutoBid()" id="buttonCancelAutoBid" type="button" class="btn btn-danger mb-3 w-100 justify-content-between">CANCEL AUTO BID</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row m-1">
                    <div class="col-md-4 no-gutters">
                    </div>
                    <div class="col-12 col-md-8 no-gutters">
                        <form method="POST" id="autoBidForm" action="/auction/{{ $idIkan }}"  class="row">
                            <div class="col-7 col-md-9" style="padding-right:0px">
                                <!-- <input type="text" id="auto_bid2" name="auto_bid2" class="form-control" value="{{ $logBid->auto_bid ?? '' }}" id="exampleFormControlInput1" placeholder="Nominal Max Auto BID"> -->
                                <input type="text" id="auto_bid" name="auto_bid" class="form-control" value="" id="exampleFormControlInput1" placeholder="Nominal Max Auto BID">
                            </div>
                            <div class="col-5 col-md-3" style="padding-left:0px">
                                <button type="submit" id="buttonAutoBid" class="btn btn-danger w-100 justify-content-between">
                                    AUTO BID
                                </button>
                            </div>
                        </form>

                        <div class="alert alert-danger bid alert-dismissible fade mb-0 mt-1" role="alert">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/js/price-separator.min.js') }}"></script>
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
    let currentTime = "{{ $now }}";
    let addedExtraTime = "{{ $addedExtraTime }}";
    let currentEndTime = auctionProduct.event.tgl_akhir;

    $('#nominal_bid').priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.'
    });

    $('#auto_bid').priceFormat({
        prefix: '',
        centsLimit: 0,
        thousandsSeparator: '.'
    });

    // easyNumberSeparator({
    //     selector: '#nominal_bid2',
    //     separator: '.',
    //     resultInput: '#nominal_bid',
    // })

    // easyNumberSeparator({
    //     selector: '#auto_bid2',
    //     separator: '.',
    //     resultInput: '#auto_bid',
    // })

    $('#normalBidForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let url = $(this).attr('action')
        let kb = parseInt(auctionProduct.kb);

        var inputNominalBid = parseInt($('#nominal_bid').unmask());
        var nextNominalBid = (currentMaxBid + inputNominalBid);

        formData.set('nominal_bid', nextNominalBid)

        bidding(formData, url);
    })

    function cancelAutoBid ()
    {
        statusAutoBid = false;
        document.getElementById("nominal_bid").disabled = false;
        document.getElementById("auto_bid").disabled = false;
        $('#buttonCancelAutoBid').attr('hidden', 'hidden');
        $('#buttonNormalBid').removeAttr('hidden');
        $('#buttonAutoBid').html(`AUTO BID`)
    }

    $('#autoBidForm').submit(function(e) {
        document.getElementById("nominal_bid").disabled = true;
        document.getElementById("auto_bid").disabled = true;
        $('#buttonCancelAutoBid').removeAttr('hidden');
        $('#buttonNormalBid').attr('hidden', 'hidden');
        $('#buttonAutoBid').html(`
            <div class="spinner-border" style="width: 1rem; height: 1rem" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `)
        e.preventDefault();
        let formData = new FormData(this);
        let url = $(this).attr('action')
        let kb = parseInt(auctionProduct.kb);

        let inputNominalBid = parseInt($('#nominal_bid').unmask());
        let nextNominalBid = (kb + inputNominalBid);

        statusAutoBid = true;

        autoBid = parseInt($('#auto_bid').unmask());

        formData.append('nominal_bid', nextNominalBid)
        formData.append('auto_bid', autoBid)
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

            let inputNominalBid = parseInt($('#nominal_bid').unmask());
            let nextNominalBid = (kb + inputNominalBid);

            formData.set('nominal_bid', nextNominalBid)

        },
        success: function(res){
            $('#nominal_bid').val('')
            nominalBid = formData.get('nominal_bid');
            // autoBid = parseInt($('#auto_bid').val());

            // if (nominalBid > currentMaxBid) {
            //     statusAutoBid = false;
            // }
        },
        error(err){
            $('.alert.bid').html(err.responseJSON.message);

            $('.alert.bid').addClass('show');

            setTimeout(function(){ $('.alert.bid').removeClass('show') }, 2000);
        }
    })
    }

    function autoDetailBid ()
    {
        urlGet = `/auction/${idIkan}/detail`;

        autoBid = parseInt($('#auto_bid').unmask());

        $.ajax({
        type: 'GET',
        contentType: false,
        processData: false,
        url: urlGet,
        beforeSend:function(){

        },
        complete: function(){
            // console.log({currentMaxBid, autoBid, nominalBid, meMaxBid})
            setTimeout(() => { autoDetailBid() }, 2000);

            // console.log({statusAutoBid, autoBid, nominalBid})
            if (meMaxBid === true) {
                console.log('meMaxBid')
                return false;
            }

            if (statusAutoBid === false) {
                console.log('statusAutoBid')
                return false;
            }

            if (currentMaxBid >= autoBid) {
                cancelAutoBid();

                return false;
            }

            let formData = new FormData(document.getElementById("autoBidForm"));

            let url = $('#autoBidForm').attr('action')
            let kb = parseInt(auctionProduct.kb);

            let nextNominalBid = (kb + currentMaxBid);

            var autoBid = parseInt($('#auto_bid').unmask());

            formData.append('auto_bid', autoBid)
            formData.set('nominal_bid', nextNominalBid)

            bidding(formData, url);
        },

        success: function(res){
            // $('#nominal_bid').val(formData.get('nominal_bid'))
            // nominalBid = formData.get('nominal_bid');
            // autoBid = parseInt($('#auto_bid').val());

            meMaxBid = res.meMaxBid;

            if (res.maxBid !== null) {
                currentMaxBid = parseInt(res.maxBid)
            }

            if (res.logBid !== null) {
                nominalBid = parseInt(res.logBid.nominal_bid)
            }

            $('#currentPrice').html(`Rp. ${res.maxBid}`);
        },
        error(err){

        }
    })
    }

    function startTimer() {
        // let modalRunningOutHasShown = false;
        var currTime = moment()
        var end = moment(currentEndTime);
        var endTime = end.valueOf();

        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get today's date and time and extend it
            var now = currTime.add(1, 'seconds').valueOf();

            // Find the distance between now and the count down date
            var duration = endTime - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(duration / (1000 * 60 * 60 * 24));
            var hours = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            hours = hours + (days * 60);
            var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((duration % (1000 * 60)) / 1000);

            // Display the result in the element with id="timer"
            const hourString = `${hours < 10 ? '0' : ''}${hours}`;
            const minuteString = `${minutes < 10 ? '0' : ''}${minutes}`;
            const secondString = `${seconds < 10 ? '0' : ''}${seconds}`;
            const timerString = `${hourString} : ${minuteString} : ${secondString}`;
            $('.countdown-label').html(timerString);

            // If the count down is finished, finish the exam
            if (duration < 0) {
                $('.countdown-label').html(`00 : 00 : 00`);

                clearInterval(x);
                startExtraTimer();
            }
        }, 1000);
    }

    function startExtraTimer() {
            // let modalRunningOutHasShown = false;
            var currTime = moment()

            var end = moment(addedExtraTime);
            var endTime = end.valueOf();
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time and extend it
                var now = currTime.add(1, 'seconds').valueOf();

                // Find the distance between now and the count down date
                var duration = endTime - now;

                // Time calculations for days, hours, minutes and seconds
                // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((duration % (1000 * 60)) / 1000);

                // Display the result in the element with id="timer"
                const hourString = `${hours < 10 ? '0' : ''}${hours}`;
                const minuteString = `${minutes < 10 ? '0' : ''}${minutes}`;
                const secondString = `${seconds < 10 ? '0' : ''}${seconds}`;
                const timerString = `${hourString} : ${minuteString} : ${secondString}`;
                $('.countdown-label').html(timerString);

                // If the count down is finished, finish the exam
                if (duration < 0) {
                    $('.countdown-label').html(`00 : 00 : 00`);

                    document.getElementById("nominal_bid").disabled = true;
                    document.getElementById("auto_bid").disabled = true;
                    document.getElementById("buttonAutoBid").disabled = true;
                    document.getElementById("buttonNormalBid").disabled = true;
                    clearInterval(x);
                }
        }, 1000);
    }

    startTimer();
    autoDetailBid();

    </script>
@endpush

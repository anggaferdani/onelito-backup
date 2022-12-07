@extends('layout.main')

@section('container')
    <style>
        /* .card {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-direction: column;
        } */

        @media screen and (max-width: 600px) {
            .card-body {
                min-height: 217px;
            }

            .card-title {
                min-height: 26px;
            }
        }

        .cb-judul {
            height: 6rem;

        }
    </style>
    @if ($currentAuction && $currentAuction->kategori_event === "Event")
        @php
            $bannerImg = 'img/event.png';

            if ($currentAuction->banner !== null) {
                $bannerImg = url('storage') .'/'. $currentAuction->banner;
            }
        @endphp
        <div class="container-fluid p-0 mb-3">
            <img src="{{ $bannerImg }}" class="w-100" alt="...">
            <br>
        </div>
    @endif
    <div class="container">
        @if ($currentAuction && $currentAuction->kategori_event === "Regular")
            <h5>Rules Auction</h5>
            <p class="m-0">{!! $currentAuction->rules_event ?? "" !!}</p>

            {{-- <div class="my-5">
                <p style="color: red">{{ $currentAuction->deskripsi_event ?? "" }}</p>
            </div> --}}
        @endif

        @php
            $auctionTitle = "Special";

            if ($currentAuction && $currentAuction->kategori_event === "Event") {
                $auctionTitle = "Event";
            }

        @endphp

        <div class="container-fluid">
            <div>
                {{-- <h5>{{ $auctionTitle }} Auction</h5>

                <img src="{{ url('img/nolelang.png') }}" class="d-block w-100" alt="ceklis"> --}}
            </div>



            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-5">

            @forelse($auctionProducts as $auctionProduct)
                    @php
                        $photo = 'img/koi11.jpg';
                        if ($auctionProduct->photo !== null)
                        {
                            $photo = url('storage') .'/'. $auctionProduct->photo->path_foto;
                        }

                        $currentMaxBid = $auctionProduct->ob;

                        if ($auctionProduct->maxBid !== null) {
                            $currentMaxBid = $auctionProduct->maxBid->nominal_bid;
                        }
                    @endphp
                <div class="col mt-3">
                    <div class="card">
                        <img src="{{ $photo }}" class="card-img-top" alt="..." style="height: 310px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $auctionProduct->variety }} |   {{ $auctionProduct->breeder }} | {{ $auctionProduct->bloodline }} | {{ $auctionProduct->size }}</h5>
                            <p class="m-0">Number of bids</p>
                            <p class="" style="color: red">{{ $auctionProduct->bid_details_count }}</p>
                            <div class="row">
                                <div class="col-6 p-0 px-lg-2">
                                    <p class="m-0" style="font-size:80%">Harga saat ini</p>
                                    <p class="m-0" style="color: red;font-size:75%">Rp. {{ number_format($currentMaxBid, 0, '.', '.') }}</p>
                                </div>

                                <div class="col-6 p-0 px-lg-2">
                                    <p class="m-0" style="text-align: end;font-size:80%">Countdown</p>
                                    <p class="m-0 countdown-label" id="{{ $auctionProduct->id_ikan }}" data-endtime="{{ $auctionProduct->event->tgl_akhir }}" data-end-extratime="{{ $auctionProduct->tgl_akhir_extra_time }}" style="text-align: end;color :red;font-size:75%;">00:00:00</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6 p-0 px-sm-2">
                                    <a id="btn-bid-{{ $auctionProduct->id_ikan }}" href="{{ '/auction-bid-now/'. $auctionProduct->id_ikan }}" class="btn btn-danger w-100 d-flex justify-content-between p-1"
                                        style="font-size: 80%">BID NOW <span><i
                                                class="fa-solid fa-circle-chevron-right"></i></span></a>
                                </div>
                                <div class="col-6 col-md-6 pe-0 px-sm-2">
                                    <a href="{{ '/auction/'. $auctionProduct->id_ikan }}"
                                        class="btn btn-secondary w-100 d-flex justify-content-between px-1 p-1"
                                        style="font-size: 80%">DETAIL <span><i
                                                class="fa-solid fa-circle-chevron-right"></i></span></a>
                                </div>
                                <div class="col-9 p-0">
                                    <a target="_blank" href="{{ $auctionProduct->link_video }}" class="btn btn-light w-100 d-flex justify-content-between">VIDEO
                                        <span><i class="fa-solid fa-circle-chevron-right"></i></span></a>
                                </div>
                                <div class="col-3 p-0">
                                    <button class="border-0 m-1" style="background-color: transparent;font-size:larger; float: right"><i
                                            class="far fa-heart"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <img src="{{ url('img/nolelang.png') }}" class="d-block w-100 mt-5" alt="ceklis">
            @endforelse
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
<script type="text/javascript">
    let currentTime = "{{ $now }}";
    let timerLabels = document.getElementsByClassName('countdown-label');

    function allTimer() {
        $.each(timerLabels,function(prefix,val) {
            var addedExtraTime = $(val).attr('data-end-extratime');
            var currentEndTime = $(val).attr('data-endtime');

            startTimer(addedExtraTime, currentEndTime, val)
        })
    }

    allTimer()

    function startTimer(addedExtraTime, currentEndTime, val) {
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
            const timerString = `${hourString}:${minuteString}:${secondString}`;
            $(val).html(timerString);

            // If the count down is finished, finish the exam
            if (duration < 0) {
                $(val).html(`00:00:00`);

                clearInterval(x);
                startExtraTimer(addedExtraTime, val);
            }
        }, 1000);
    }

    function startExtraTimer(addedExtraTime, val) {
        var currTime = moment()

        var end = moment(addedExtraTime);
        var endTime = end.valueOf();
        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get today's date and time and extend it
            var now = currTime.add(1, 'seconds').valueOf();

            // Find the distance between now and the count down date
            var duration = endTime - now;
            // duration = 0;

            // console.log($(val))

            // Time calculations for days, hours, minutes and seconds
            // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((duration % (1000 * 60)) / 1000);

            // Display the result in the element with id="timer"
            const hourString = `${hours < 10 ? '0' : ''}${hours}`;
            const minuteString = `${minutes < 10 ? '0' : ''}${minutes}`;
            const secondString = `${seconds < 10 ? '0' : ''}${seconds}`;
            const timerString = `${hourString}:${minuteString}:${secondString}`;
            $(val).html(timerString);

            // If the count down is finished, finish the exam
            if (duration < 0) {
                var id = $(val).attr('id');
                $(val).html(`00:00:00`);

                document.getElementById(`btn-bid-${id}`).disabled = true;
                // document.getElementById("auto_bid").disabled = true;
                // document.getElementById("buttonAutoBid").disabled = true;
                // document.getElementById("buttonNormalBid").disabled = true;
                clearInterval(x);
            }
        }, 1000);
    }
</script>
@endpush

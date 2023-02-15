@extends('layout.mainlog')

@section('container')
<br><br><br><br><br>

    <div class="container-fluit">
        <div class="container">
        <h4 class="m-1">{{ count($wishlists) ?? '' }} <span>Barang</span></h4>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mb-5">
        @forelse($wishlists as $wishlist)
            @php

                $wishlistPhoto = url('img/uniring.jpeg');
                $wishlistable = $wishlist->wishlistable;

                if ($wishlist->wishlistable_type === 'EventFish') {
                    $wishlistPhoto = url('img/koi11.jpg');
                    $currentMaxBid = $wishlistable->ob;

                    if ($wishlistable->maxBid !== null) {
                        $currentMaxBid = $wishlistable->maxBid->nominal_bid;
                    }
                }

                if ($wishlist->wishlistable->photo !== null) {
                    $wishlistPhoto = url('storage') . '/' . $wishlist->wishlistable->photo->path_foto;
                }
            @endphp

            @if ($wishlist->wishlistable_type === 'EventFish')
                <div class="col">
                    <div class="border" >
                        <a href="{{ '/auction-bid-now/' . $wishlistable->id_ikan }}"><img src="{{ $wishlistPhoto }}"
                                alt="bio media" class="card-img-top"
                            ></a>
                        <div class="px-1">
                            <p class="cb-judul">{!! Illuminate\Support\Str::limit(
                                        "$wishlistable->variety | $wishlistable->breeder | $wishlistable->size | $wishlistable->bloodline",
                                        45,
                                    ) !!}</p>
                            <div class="row p-2">
                                <div class="col-6 p-0 ps-lg-1">
                                    <p class="m-0" style="font-size:80%">Harga saat ini</p>
                                    <p class="m-0" style="color: red;font-size:75%">Rp
                                        {{ number_format($currentMaxBid, 0, '.', '.') }}</p>
                                </div>
                                <div class="col-6 p-0 pe-lg-1">
                                    <p class="m-0 countdown-title-{{ $wishlistable->id_ikan }}"
                                        style="text-align: end;font-size:80%">Live Time</p>
                                    <p class="m-0 countdown-label" data-id="{{ $wishlistable->id_ikan }}"
                                        id="atas-{{ $wishlistable->id_ikan }}"
                                        data-endtime="{{ $wishlistable->event->tgl_akhir }}"
                                        data-end-extratime="{{ $wishlistable->tgl_akhir_extra_time }}"
                                        style="text-align: end;color :red;font-size:75%;">00:00:00</p>
                                </div>
                            </div>
                            <!-- <p style="font-size: 10px" class="card-text ma">Harga
                                    saat ini</p>
                            <p style="color :red;font-size: 12px" class="m-0">
                                    Rp.
                                    {{ number_format($currentMaxBid, 0, '.', '.') }}
                                </p> -->
                        </div>
                    </div>
                </div>
            @endif
            @if ($wishlist->wishlistable_type === 'Product')
                <div class="col">
                    <div class="border">
                        <a href="{{ url('/onelito_store') . '/' .$wishlist->wishlistable_id  }}"><img src="{{ $wishlistPhoto }}"
                                alt="bio media" class="card-img-top"
                            ></a>
                        <div class="px-1">
                            <p class="cb-judul">{!! Illuminate\Support\Str::limit(
                                    $wishlist->wishlistable->merek_produk . ' ' . $wishlist->wishlistable->nama_produk,
                                    100,
                                ) !!}</p>
                            <p><b>Rp.
                                    {{ number_format($wishlist->wishlistable->harga, 0, '.', '.') }}</b></p>
                            <button class="mb-3 text-danger "
                                style="background-color: transparent;font-size:small;border-color:red"><i
                                    class="fa-solid fa-plus"></i>
                                <span>Keranjang</span></button>
                        </div>
                    </div>
                </div>
            @endif
        @empty
        @endforelse
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let currentTime = "{{ $now }}";
        let timerLabels = document.getElementsByClassName('countdown-label');
        let addedExtraTimeGroups = [];

        setInterval(function() {
            getCurrentNow();
        }, 700);

        function allTimer() {
            $.each(timerLabels, function(prefix, val) {
                var addedExtraTime = $(val).attr('data-end-extratime');
                var currentEndTime = $(val).attr('data-endtime');

                startTimer(addedExtraTime, currentEndTime, val)
            })
        }

        setInterval(function() {
            getCurrentNow();
        }, 700);

        function getCurrentNow()
        {
            $.ajax({
                type: 'GET',
                contentType: false,
                processData: false,
                url: '/now',
                beforeSend: function() {

                },
                success: function(res) {
                    currentTime = res;
                },
                error(err) {

                }
            })
        }

        allTimer()

        function startTimer(addedExtraTime, currentEndTime, val) {
            var currTime = moment(currentTime)
            var end = moment(currentEndTime);
            var endTime = new Date(currentEndTime).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time and extend it
                var now = new Date(currentTime).getTime();

                // Find the distance between now and the count down date
                var duration = endTime - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(duration / (1000 * 60 * 60 * 24));
                var hours = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                hours = hours + (days * 24);
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


            var id = $(val).attr('data-id');
            var idTitle = $(val).attr('id');

            addedExtraTimeGroups[id] = addedExtraTime;

            if (idTitle === `bawah-${id}`) {
                setInterval(function() {
                    autoDetailBid(id);
                }, 2500);
            }

            // Update the count down every 1 second
            var x = setInterval(function() {
                var id = $(val).attr('data-id');
                var endTime = new Date(addedExtraTimeGroups[id]);

                // Get today's date and time and extend it
                var now = new Date(currentTime);

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
                var id = $(val).attr('id');
                $(`#countdown-title-${id}`).html(`Extra Time`);


                // If the count down is finished, finish the exam
                if (duration < 0) {
                    $(val).html(`00:00:00`);

                    // document.getElementById(`btn-bid-${id}`).disabled = true;
                    // document.getElementById("auto_bid").disabled = true;
                    // document.getElementById("buttonAutoBid").disabled = true;
                    // document.getElementById("buttonNormalBid").disabled = true;
                    clearInterval(x);
                }
            }, 1000);
        }

        function autoDetailBid(idIkan) {
            urlGet = `/auction/${idIkan}/detail`;

            $.ajax({
                type: 'GET',
                contentType: false,
                processData: false,
                url: urlGet,
                beforeSend: function() {

                },
                success: function(res) {
                    meMaxBid = res.meMaxBid;

                    if (res.maxBid !== null) {
                        currentMaxBid = parseInt(res.maxBid)
                    }

                    if (res.logBid !== null) {
                        nominalBid = parseInt(res.logBid.nominal_bid)
                    }

                    // var currentPriceHtml = $('#currentPrice').html();
                    // var formatedMaxBid = thousandSeparator(res.maxBid)
                    // $('#currentPrice').html(`${formatedMaxBid}`);

                    addedExtraTimeGroups[idIkan] = res.addedExtraTime;
                },
                error(err) {

                }
            })
        }
    </script>
@endpush

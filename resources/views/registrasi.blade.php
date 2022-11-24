<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <style>
        .select2-container--default .select2-selection--single {
            height: 100%;
            border-radius: 7px;
            border-color: rgb(209 213 219);
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding: 7px 10px;
            color: rgb(17, 24, 39);
            font-size: 14px
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 10px;
            right: 10px;
        }

        .relative #form-edit {
            height: 1000rem;
        }
    </style>


    <title>ONELITO KOI</title>
</head>

<body>
    <div class="container w-75">
        <div style="position: absolute">
            <a href="/" class="text-dark float-start" style="text-decoration: blink"><i
                    class="fa-solid fa-arrow-left text dark"></i> Back to main page</a>
        </div>
        <center><img src="img/oneli.svg" alt="ONELITO" class="my-5 pt-10"></center>

        <form method="POST" id="registration" action="/register">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="relative">
                                <input type="text" name="nama" id="namadepan" required
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="namadepan"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Nama
                                    depan</label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="relative">
                                <input type="text" name="nama" id="namabelakang" required
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="namabelakang"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Nama
                                    belakang</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="relative">
                                <input type="email" name="email" id="email" required
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="email"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Email</label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="relative">
                                <input type="text" name="password" id="password" required
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="password"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Kata
                                    Sandi</label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="relative">
                                <input type="text" name="password" id="ferpassword" required
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="ferpassword"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Konfirmasi
                                    Kata Sandi</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="relative">
                                <input type="text" name="no_hp" id="no_hp" required
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="no_hp"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">No.Handphone</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="relative ">
                                {{-- <input type="text" name="province" id="province"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="province"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Provinsi</label>
                                --}}
                                <select name="provinsi" id="provinsi" required class="select2-setup form-control ">
                                    <option></option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->prov_id }}">{{ $province->prov_name }}</option>
                                    @endforeach
                                </select>
                                {{-- <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">Provinsi</option>
                            <option value="US">jawa barat</option>
                            <option value="CA">jawa timur</option>
                            <option value="FR">jawa tengah</option>
                            <option value="DE">jakarta selatan</option>
                        </select> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="relative">
                                {{-- <input type="text" name="city" id="city" required
                            class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="city"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Kota
                        </label> --}}
                                <select name="kota" id="kota"
                                    class="select2-setup form-control js-data-example-ajax">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="relative">
                                {{-- <input type="text" name="kecamatan" id="kecamatan"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="kecamatan"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Kecamatan
                        </label> --}}
                                <select name="kecamatan" id="kecamatan" required class="select2-setup form-control">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="relative">
                                {{-- <input type="text" name="kelurahan" id="kelurahan"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="kelurahan"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Kelurahan
                        </label> --}}
                                <select id="kelurahan" name="kelurahan" required class="select2-setup form-control">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="relative">
                                <input type="text" name="alamat" id="alamat"
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="alamat"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Alamat</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="relative">
                                <input type="text" name="kode_pos" id="kode_pos"
                                    class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="kode_pos"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Kode
                                    pos</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br><br><br><br><br>
            <center>
                <div class="d-grid gap-2 col-lg-4 mx-auto px-lg-4">
                    <button type="submit"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        REGISTER </button>
                </div>
                <p class="mb-5">Already have an account? Come on in right away <a class="text-danger"
                        style="text-decoration: blink" href="/login">here</a></p>
            </center>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <br><br>
                    <div class="modal-body">
                        <center><img src="{{ url('img/Frame_reg.png') }}" alt="ceklis">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Registration Successful
                            </h3>
                            <p>Your account will be verified. Verification notification
                                will be sent via email</p>
                            <br><br><br><br>
                            <a href="/login"><button type="button"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">OKE</button></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#provinsi').select2({
                placeholder: 'Provinsi'
            });

            $('#kota').select2({
                placeholder: 'Kota'
            });

            $('#kecamatan').select2({
                placeholder: 'Kecamatan'
            });

            $('#kelurahan').select2({
                placeholder: 'Kelurahan'
            });

            function ajaxChained(source, target, slug) {
                $(source).on('change', function() {
                    var pid = $(source + ' option:selected').val(); //$(this).val();

                    $.ajax({
                        type: 'GET',
                        url: '/' + slug + pid,
                        dataType: 'html',
                        success: function(txt) {
                            //no action on success, its done in the next part
                        }
                    }).done(function(data) {
                        //get JSON
                        data = $.parseJSON(data);


                        //generate <options from JSON
                        var list_html = '';
                        $.each(data, function(i, item) {
                            if (target === '#kota') {
                                list_html += '<option value=' + data[i].city_id + '>' +
                                    data[i].city_name + '</option>'
                            } else if (target === '#kecamatan') {
                                list_html += '<option value=' + data[i].dis_id + '>' + data[
                                    i].dis_name + '</option>';
                            } else {
                                list_html += '<option value=' + data[i].subdis_id + '>' +
                                    data[i].subdis_name + '</option>';
                            }

                        });
                        //replace <select2 with new options
                        $(target).html(list_html);
                        if (target === '#kota' || target === '#edit_kota') {
                            $('#kecamatan').html('');
                            $('#kelurahan').html('');
                            $('#kecamatan').select2({
                                placeholder: 'Kecamatan'
                            });
                            $('#kelurahan').select2({
                                placeholder: 'Kelurahan'
                            });

                        } else if (target === '#kecamatan' || target === '#edit_kecamatan') {
                            $('#kelurahan').html('');
                            $('#kelurahan').select2({
                                placeholder: 'Kelurahan'
                            });
                        } else {}
                        //change placeholder text
                        $(target).select2({
                            placeholder: data.length + ' results'
                        });
                    });
                })
            }

            ajaxChained('#provinsi', '#kota', 'cities?prov_id=');
            ajaxChained('#kota', '#kecamatan', 'districts?city_id=');
            ajaxChained('#kecamatan', '#kelurahan', 'subdistricts?dis_id=');
        });

        $('#registration').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = $(this).attr('action')

            $.ajax({
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                url: url,
                beforeSend: function() {

                },
                complete: function() {

                },
                success: function(res) {
                    $('#exampleModal').modal('show')
                },
                error(err) {

                }
            })

        })
    </script>
</body>

</html>

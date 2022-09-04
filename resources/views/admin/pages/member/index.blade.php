@extends('admin.layouts.app')

@section('title', 'Member')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

    <link rel="stylesheet"
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Management Member</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Management Member</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <button class="btn btn-primary mb-3"
                            data-toggle="modal"
                            data-target="#modalCreate"
                            ><i class="fa fa-plus"></i> Tambah Member</button>

                                <div class="table-responsive">
                                    <table class="table-striped table"
                                        id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No. hp</th>
                                                <th>Alamat</th>
                                                <th>Provinsi</th>
                                                <!-- <th>Kecamatan</th> -->
                                                <!-- <th>Kelurahan</th> -->
                                                <th>Kota</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.pages.member._create')
        @include('admin.pages.member._show')
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <!-- <script src="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.js') }}"></script> -->
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/admin-admin.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table-1').DataTable({
                // dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength','csv', 'excel', 'pdf', 'print',
                ],
                "responsive": true,
                "autoWidth" : true,
                "processing" : true,
                "serverSide" : true,
                search: {
                    return: true
                },

                ajax : {
                url : '{{ url("admin/members") }}',
                data : function(d) {
                    // d.jenis_task = $('#filter_jenis_task').val()
                }
                },
                columns : [
                    { data : 'DT_RowIndex' , orderable : false,searchable :false},
                    { data : 'nama' },
                    { data : 'email'},
                    { data : 'no_hp'},
                    { data : 'alamat' , orderable : false,searchable :false},
                    { data : 'provinsi' , orderable : false,searchable :false},
                    // { data : 'kecamatan' , orderable : false,searchable :false},
                    // { data : 'kelurahan' , orderable : false,searchable :false},
                    { data : 'kota' , orderable : false,searchable :false},
                    { data : 'action' , orderable : false,searchable :false},
                ]
            });
        });

        $(document).on('click','button#btn-show',function() {
            let id = $(this).data('id');
            let dataUrl = $(this).data('url');
            console.log(dataUrl);
            $.ajax({
                type: 'GET',
                url : `members/${id}`,
                dataType: "json",
                success: function(res) {
                    $('#modalShow').modal('show');
                    $('#show_nama').val(res.nama)
                    $('#show_email').val(res.email)
                    $('#show_no_hp').val(res.no_hp)
                    $('#show_alamat').val(res.alamat)
                    $('#show_provinsi').val(res.provinsi)
                    $('#show_kota').val(res.kota)
                    $('#show_kecamatan').val(res.kecamatan)
                    $('#show_kelurahan').val(res.kelurahan)
                    $('#show_kode_pos').val(res.kode_pos)
                },
                error:function(error) {
                    console.log(error)
                }

            })
        })


    </script>


@endpush

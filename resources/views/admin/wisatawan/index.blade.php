@extends('admin.layout.template')
@section('title', 'Data Tiket Wisatawan')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Konfirm Pembayaran</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/home">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Konfirm Pembayaran</a>
                </li>
            </ul>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success') }}.
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Error!</h5>
                {{ session('error') }}.
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="add-row_length"><label>Show <select
                                                    name="add-row_length" aria-controls="add-row"
                                                    class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_filter">
                                            <form action="" method="GET" class="col-sm-3">
                                                <select name="" aria-controls="add-row"
                                                    class="form-control form-control-sm">
                                                    <option value="">Jenis Wisatawan</option>
                                                    <option value="lokal">Lokal</option>
                                                    <option value="Mancanegara">Mancanegara</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="add-row_filter" class="dataTables_filter">
                                            <form class="form-control-right" action="{{ route('admin.payment') }}"
                                                method="GET">
                                                <label>Search:<input type="search" class="form-control form-control-sm"
                                                        placeholder="" value=" {{ old('cari') }}" name="cari"
                                                        aria-controls="add-row"></label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="table display table-striped table-hover dataTable"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Tanggal Pesan</th>
                                                    <th>Status Pemesanan</th>
                                                    <th>Maksimal Pembayaran</th>
                                                    <th>Nama Ketua</th>
                                                    <th>Email</th>
                                                    <th>No Hp</th>
                                                    <th>Kebangsaan</th>
                                                    <th>Jumlah Anggota</th>
                                                    <th>Nomor Identitas</th>
                                                    <th>Total Bayar</th>
                                                    <th>Bukti Pembayaran</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($pesanan as $data)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ date('l, d F Y', strtotime($data->tanggal_pesan)) }} Pukul
                                                            {{ date('H:i', strtotime($data->tanggal_pesan)) }} WIB
                                                        </td>
                                                        <td><button
                                                                class="btn btn-warning btn-sm">{{ $data->status_pemesanan }}</button>
                                                        </td>
                                                        <td>{{ date('l, d F Y', strtotime($data->maksimal_pembayaran)) }}
                                                            Pukul
                                                            {{ date('H:i', strtotime($data->maksimal_pembayaran)) }} WIB
                                                        </td>
                                                        <td>{{ $data->wisatawan->nama }}</td>
                                                        <td>{{ $data->wisatawan->email }}</td>
                                                        <td>{{ $data->wisatawan->no_hp }}</td>
                                                        <td>{{ $data->wisatawan->kebangsaan->negara }}</td>
                                                        <td>{{ $data->jumlah_tiket }}</td>
                                                        <td>{{ $data->wisatawan->nomor_identitas }}</td>
                                                        <td>Rp. {{ number_format($data->total_harga) }}</td>
                                                        <td>
                                                            {{-- <img src="{{ asset('upload_bukti/' . $data->upload_bukti) }}"
                                                                width="50px"> --}}
                                                            <button class="btn btn-primary btn-outline "
                                                                data-target="#buktiPembayaran{{ $data->id }}"
                                                                data-toggle="modal">Lihat Bukti
                                                                Pembayaran</button>
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="{{ route('admin.payment.detail', $data->id) }}"><button
                                                                        class="btn btn-icon btn-round btn-primary"><i
                                                                            class="fa fa-info"></i></button>
                                                                </a>
                                                                <a href="{{ route('admin.payment.terima', $data->id) }}">
                                                                    <button class="btn btn-icon btn-round btn-success"
                                                                        id="alert_demo_3_3"><i
                                                                            class="fas fa-check-circle"></i></button>
                                                                </a>
                                                                <button class="btn btn-icon btn-round btn-danger"
                                                                    id="alert_demo_8" data-id="{{ $data->id }}"><i
                                                                        class="fas fa-times-circle"></i></button>
                                                            </div>
                                                        </td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                            Showing 1 to 5 of 10 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="add-row_previous"><a href="#" aria-controls="add-row"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="add-row" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="add-row"
                                                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item next" id="add-row_next"><a href="#"
                                                        aria-controls="add-row" data-dt-idx="3" tabindex="0"
                                                        class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Bukti Pembayaran-->
    @foreach ($pesanan as $data)
        <div class="modal fade" id="buktiPembayaran{{ $data->id }}" aria-hidden="true"
            aria-labelledby="buktiPembayaranLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buktiPembayaranLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ url('upload_bukti/' . $data->upload_bukti) }}" width="100%" height="100%">
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach

    <script>
        //== Class definition
        var SweetAlert2Demo = function() {
            var id = button.data('id')
            //== Demos
            var initDemos = function() {

                $('#alert_demo_3_3').click(function(e) {
                    swal("Good job!", "Success Menerima Pemesanan.", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });

                $('#alert_demo_8').click(function(event) {
                    swal({
                        title: 'Apakah Anda Yakin?',
                        text: "Menolak Pemesanan ini?",
                        icon: "warning",
                        type: 'warning',
                        buttons: {
                            cancel: {
                                visible: true,
                                text: 'No, cancel!',
                                className: 'btn btn-link'
                            },
                            confirm: {
                                text: 'Yes, delete it!',
                                className: 'btn btn-danger'
                            }
                        }
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location =
                                "{{ route('admin.payment.tolak', '.+id+.') }}"
                            swal("Allright, Maybe Next Time. Have a Nice Day!", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                        } else {
                            swal.close();
                        }
                    });
                })

            };

            return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        }();

        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>
@endsection

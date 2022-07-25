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
                                    <div class="col-sm-12">
                                        <table id="table-confirm" class="table display table-striped table-hover dataTable"
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table-confirm').DataTable();
        });
    </script>
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

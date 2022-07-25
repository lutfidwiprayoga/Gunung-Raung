@extends('admin.layout.template')
@section('title', 'Riwayat Perjalanan Pemandu Jalur')

@section('contentadmin')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Riwayat Perjalanan</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Perjalanan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills nav-primary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                            <li class="nav-item submenu">
                                <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill"
                                    href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd"
                                    aria-selected="true">Masih Pendakian</a>
                            </li>
                            <li class="nav-item submenu">
                                <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill"
                                    href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd"
                                    aria-selected="false">Riwayat Pendakian</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                            <div class="tab-pane fade active show" id="pills-home-nobd" role="tabpanel"
                                aria-labelledby="pills-home-tab-nobd">
                                <div class="table-responsive">
                                    <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="proses-perjalanan"
                                                    class="table display table-striped table-hover dataTable" role="grid"
                                                    aria-describedby="add-row_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>No</th>
                                                            <th>Tanggal Naik</th>
                                                            <th>Tanggal Selesai</th>
                                                            <th>Nama Ketua Wisatawan</th>
                                                            <th>Alamat</th>
                                                            <th>Jumlah Anggota</th>
                                                            <th>Paket Yang Dipilih</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        @foreach ($notif1 as $item)
                                                            <tr role="row" class="odd">
                                                                <td>{{ $no++ }}</td>
                                                                <td>
                                                                    {{ date('l, d F Y', strtotime($item->pesanan->wisatawan->kuota->tanggal_pendakian)) }}
                                                                </td>
                                                                <td>
                                                                    {{ date('l, d F Y', strtotime($item->pesanan->wisatawan->tanggal_turun)) }}
                                                                </td>
                                                                <td>{{ $item->pesanan->wisatawan->nama }}</td>
                                                                <td>{{ $item->pesanan->wisatawan->alamat }}</td>
                                                                <td>{{ $item->pesanan->jumlah_tiket }}</td>
                                                                <td>{{ $item->pesanan->wisatawan->perjalanan->nama_paket }}
                                                                </td>
                                                                <td><button
                                                                        class="btn btn-info btn-sm">{{ $item->pesanan->status_guide }}</button>
                                                                </td>
                                                                <td><a href="{{ route('myorder.edit', $item->id) }}"
                                                                        class="btn btn-primary btn-round btn-sm">Akhiri
                                                                        Pendakian</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel"
                                aria-labelledby="pills-profile-tab-nobd">
                                <div class="table-responsive">
                                    <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="riwayat-perjalanan"
                                                    class="table display table-striped table-hover dataTable" role="grid"
                                                    aria-describedby="add-row_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>No</th>
                                                            <th>Tanggal Naik</th>
                                                            <th>Tanggal Selesai</th>
                                                            <th>Nama Ketua Wisatawan</th>
                                                            <th>Alamat</th>
                                                            <th>Jumlah Anggota</th>
                                                            <th>Paket Yang Dipilih</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        @foreach ($notif as $item)
                                                            <tr role="row" class="odd">
                                                                <td>{{ $no++ }}</td>
                                                                <td>
                                                                    {{ date('l, d F Y', strtotime($item->pesanan->wisatawan->kuota->tanggal_pendakian)) }}
                                                                </td>
                                                                <td>
                                                                    {{ date('l, d F Y', strtotime($item->pesanan->wisatawan->tanggal_turun)) }}
                                                                </td>
                                                                <td>{{ $item->pesanan->wisatawan->nama }}</td>
                                                                <td>{{ $item->pesanan->wisatawan->alamat }}</td>
                                                                <td>{{ $item->pesanan->jumlah_tiket }}</td>
                                                                <td>{{ $item->pesanan->wisatawan->perjalanan->nama_paket }}
                                                                </td>
                                                                <td><button
                                                                        class="btn btn-info btn-sm">{{ $item->pesanan->status_guide }}</button>
                                                                </td>
                                                            </tr>
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
        </div>
    </div>
    <!--Datatable-->
    <script>
        $(document).ready(function() {
            $('#riwayat-perjalanan').DataTable();
        });
        $(document).ready(function() {
            $('#proses-perjalanan').DataTable();
        });
    </script>
@endsection

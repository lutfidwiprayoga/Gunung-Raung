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
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="table display table-striped table-hover dataTable"
                                            role="grid" aria-describedby="add-row_info">
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
                                                            {{ date('l, d F Y', strtotime($item->pesanan->wisatawan->tanggal_naik)) }}
                                                        </td>
                                                        <td>
                                                            {{ date('l, d F Y', strtotime($item->pesanan->wisatawan->tanggal_turun)) }}
                                                        </td>
                                                        <td>{{ $item->pesanan->wisatawan->nama }}</td>
                                                        <td>{{ $item->pesanan->wisatawan->alamat }}</td>
                                                        <td>{{ $item->pesanan->jumlah_tiket }}</td>
                                                        <td>{{ $item->pesanan->wisatawan->perjalanan->nama_paket }}</td>
                                                        <td><button
                                                                class="btn btn-info btn-sm">{{ $item->pesanan->status_guide }}</button>
                                                        </td>
                                                    </tr>
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

@endsection

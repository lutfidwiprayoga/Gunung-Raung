@extends('admin.layout.template')
@section('title', 'Data Tiket Wisatawan')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Riwayat Pemesanan</h4>
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
                    <a href="">Riwayat Pemesanan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
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
                                            <form class="form-control-right"
                                                action="{{ route('admin.riwayatwisatawan.index') }}" method="GET">
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
                                                @foreach ($riwayat1 as $data)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ date('l, d F Y', strtotime($data->pesanan->tanggal_pesan)) }}
                                                            Pukul
                                                            {{ date('H:i', strtotime($data->pesanan->tanggal_pesan)) }}
                                                            WIB
                                                        </td>
                                                        <td><button
                                                                class="btn btn-info btn-sm">{{ $data->pesanan->status_pemesanan }}</button>
                                                        </td>
                                                        <td>{{ date('l, d F Y', strtotime($data->pesanan->maksimal_pembayaran)) }}
                                                            Pukul
                                                            {{ date('H:i', strtotime($data->pesanan->maksimal_pembayaran)) }}
                                                            WIB
                                                        </td>
                                                        <td>{{ $data->pesanan->wisatawan->nama }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->email }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->no_hp }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->kebangsaan->negara }}</td>
                                                        <td>{{ $data->pesanan->jumlah_tiket }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->nomor_identitas }}</td>
                                                        <td>Rp. {{ number_format($data->total_harga) }}</td>
                                                        <td>
                                                            <img src="{{ asset('upload_bukti/' . $data->pesanan->upload_bukti) }}"
                                                                width="50px">
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a
                                                                    href="{{ route('admin.riwayatwisatawan.show', $data->id) }}"><button
                                                                        class="btn btn-icon btn-round btn-info"><i
                                                                            class="fa fa-info"></i></button>
                                                                </a>
                                                                <button type="button"
                                                                    class="btn btn-icon btn-round btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#delete{{ $data->id }}"
                                                                    data-original-title="Hapus Data">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                @endforeach
                                                @foreach ($riwayat2 as $data)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ date('l, d F Y', strtotime($data->pesanan->tanggal_pesan)) }}
                                                            Pukul
                                                            {{ date('H:i', strtotime($data->pesanan->tanggal_pesan)) }}
                                                            WIB
                                                        </td>
                                                        <td><button
                                                                class="btn btn-success btn-sm">{{ $data->pesanan->status_pemesanan }}</button>
                                                        </td>
                                                        <td>{{ date('l, d F Y', strtotime($data->pesanan->maksimal_pembayaran)) }}
                                                            Pukul
                                                            {{ date('H:i', strtotime($data->pesanan->maksimal_pembayaran)) }}
                                                            WIB
                                                        </td>
                                                        <td>{{ $data->pesanan->wisatawan->nama }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->email }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->no_hp }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->kebangsaan->negara }}</td>
                                                        <td>{{ $data->pesanan->jumlah_tiket }}</td>
                                                        <td>{{ $data->pesanan->wisatawan->nomor_identitas }}</td>
                                                        <td>Rp. {{ number_format($data->total_harga) }}</td>
                                                        <td>
                                                            <img src="{{ asset('upload_bukti/' . $data->pesanan->upload_bukti) }}"
                                                                width="50px">
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a
                                                                    href="{{ route('admin.riwayatwisatawan.show', $data->id) }}"><button
                                                                        class="btn btn-icon btn-round btn-info"><i
                                                                            class="fa fa-info"></i></button>
                                                                </a>
                                                                <button type="button"
                                                                    class="btn btn-icon btn-round btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#delete{{ $data->id }}"
                                                                    data-original-title="Hapus Data">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
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
    {{-- delete data --}}
    @foreach ($pesanan as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Hapus Data Wisatawan {{ $data->wisatawan->nama }}?&hellip;</p>
                    </div>
                    <form action="{{ route('admin.riwayatwisatawan.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya,
                                Hapus</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

@endsection

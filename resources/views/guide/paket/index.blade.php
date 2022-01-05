@extends('admin.layout.template')
@section('title', 'Penjadwalan Pemandu Jalur')

@section('contentadmin')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Paket Perjalanan</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/guide">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Paket Perjalanan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('guide.perjalanan.create') }}" class="ml-auto btn btn-primary btn-round">
                                <i class="fa fa-plus"></i>
                                Tambah Paket
                            </a>
                        </div>
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
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="table display table-striped table-hover dataTable"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Nama Paket Perjalanan</th>
                                                    {{-- <th>Mulai Perjalanan</th>
                                                    <th>Selesai Perjalanan</th> --}}
                                                    <th>Harga Perjalanan</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($guide as $data)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->nama_paket }}</td>
                                                        {{-- <td>{{ date('l, d-m-Y', strtotime($data->jadwal_mulai)) }}</td>
                                                        <td>{{ date('l, d-m-Y', strtotime($data->jadwal_selesai)) }}</td> --}}
                                                        <td>Rp. {{ number_format($data->harga_perjalanan) }}</td>
                                                        <td>{{ $data->keterangan }}</td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" class="btn btn-link btn-danger"
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
        {{-- delete data --}}
        @foreach ($guide as $data)
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
                            <p>Hapus Paket Perjalanan {{ $data->nama_paket }}?&hellip;</p>
                        </div>
                        <form action="{{ route('guide.perjalanan.destroy', $data->id) }}" method="POST">
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
    </div>

@endsection

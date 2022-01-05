@extends('admin.layout.template')
@section('title', 'Data Tiket')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Tiket</h4>
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
                    <a href="/kuota">Manajemen Kuota</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <button type="button" class="ml-auto btn btn-primary btn-round" data-toggle="modal"
                                data-target="#insertData" data-original-title="Tambah Data">
                                <i class="fa fa-plus"></i>Tambah Kuota
                            </button>
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
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div id="add-row_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm"
                                                    placeholder="" value=" {{ old('cari') }}" name="cari"
                                                    aria-controls="add-row"></label>
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
                                                    <th>Bulan & Tahun</th>
                                                    <th>Tanggal Pendakian</th>
                                                    <th>Kuota</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($kuota as $data)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->periode->bulan }}
                                                        </td>
                                                        <td>{{ date('l, d F Y', strtotime($data->tanggal_pendakian)) }}
                                                        </td>
                                                        <td>{{ $data->kuota }}</td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" class="btn btn-link btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#update{{ $data->id }}"
                                                                    data-original-title="Update Data">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
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
    </div>

    <!--Insert Data-->
    <div class="modal fade" id="insertData">
        <div class="modal-dialog modal-md">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.kuota.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center">Insert Data</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label">Bulan & Tahun </label>
                                            <select name="periode_id" class="form-control form-control-alternative"
                                                id="exampleFormControlSelect">
                                                <option value="" disabled>Pilih Bulan & Tahun</option>
                                                @foreach ($periode as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->bulan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('periode_id')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label">Tanggal Pendakian</label>
                                            <input name="tanggal_pendakian" type="date"
                                                class="form-control form-control-alternative"
                                                value="{{ old('tanggal_pendakian') }}">
                                            <div class="text-danger">
                                                @error('tanggal_pendakian')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label">Kuota</label>
                                            <input name="kuota" type="number" class="form-control form-control-alternative"
                                                value="{{ old('kuota') }}">
                                            <div class="text-danger">
                                                @error('kuota')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Update Data-->
    @foreach ($kuota as $data)
        <div class="modal fade" id="update{{ $data->id }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.kuota.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center">Update Data</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label">Bulan & Tahun </label>
                                                <select name="periode_id" class="form-control form-control-alternative"
                                                    id="exampleFormControlSelect">
                                                    <option value="" disabled>Pilih Bulan & Tahun</option>
                                                    @foreach ($periode as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->bulan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger">
                                                    @error('periode_id')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label">Tanggal Pendakian</label>
                                                <input name="tanggal_pendakian" type="date"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $data->kuota_pendakian }}">
                                                <div class="text-danger">
                                                    @error('tanggal_pendakian')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label">Kuota</label>
                                                <input name="kuota" type="number"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $data->kuota }}">
                                                <div class="text-danger">
                                                    @error('kuota')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    <!--Delete Data-->
    @foreach ($kuota as $data)
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
                        <p>Hapus Data ? {{ $data->id }}?&hellip;</p>
                    </div>
                    <form action="{{ route('admin.kuota.destroy', $data->id) }}" method="POST">
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

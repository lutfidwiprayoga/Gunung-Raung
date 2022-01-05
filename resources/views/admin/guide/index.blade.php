@extends('admin.layout.template')
@section('title', 'Data User Pemandu Jalur')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data User Guide</h4>
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
                    <a href="#">Data Guide</a>
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
                                                </select> entries</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="add-row_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm"
                                                    placeholder="" value=" {{ old('cari') }}" name="cari"
                                                    aria-controls="add-row"></label>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="add-row" class="table display table-striped table-hover dataTable"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Guide</th>
                                                    <th>Email</th>
                                                    <th>No Hp</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($guide as $data)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->email }}</td>
                                                        <td>{{ $data->no_hp }}</td>
                                                        <td>
                                                            <img src="{{ asset('foto_profil/' . $data->foto) }}"
                                                                width="75px">
                                                        </td>
                                                        <td>{{ $data->level }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-link btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#detail{{ $data->id }}">
                                                                <i class="fa fa-info"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-link btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $data->id }}">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
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

    {{-- detail data --}}
    @foreach ($guide as $data)
        <div class="modal fade" id="detail{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Akun</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <tr>
                                <th width="100px">Nama Guide</th>
                                <th width="30px">:</th>
                                <th>{{ $data->name }}</th>
                            </tr>
                            <br>
                            <tr>
                                <th width="100px">Email</th>
                                <th width="30px">:</th>
                                <th>{{ $data->email }}</th>
                            </tr>
                            <tr>
                                <th width="100px">No Hp</th>
                                <th width="30px">:</th>
                                <th>{{ $data->no_hp }}</th>
                            </tr>
                            <tr>
                                <th width="100px">Foto</th>
                                <th width="30px">:</th>
                                <th><img src="{{ asset('foto_profil/' . $data->foto) }}" width="75px"></th>
                            </tr>
                        </p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

    {{-- delete data --}}
    @foreach ($guide as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Akun</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Hapus Akun {{ $data->name }}?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Tidak</button>
                        <a href="/guide/delete/{{ $data->id }}" class="btn btn-danger">Ya, Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

@endsection

@extends('admin.layout.template')
@section('title', 'Data Kuota')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Kuota</h4>
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
                        <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatablekuota" class="table display table-striped table-hover dataTable">
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
                                                                data-toggle="modal" data-target="#update{{ $data->id }}"
                                                                data-original-title="Update Data">
                                                                <i class="far fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-link btn-danger"
                                                                data-toggle="modal" data-target="#delete{{ $data->id }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#datatablekuota').DataTable();
        });
    </script>
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
                                <h4 class="text-center">Tambah Data Kuota</h4>
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
                        <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Batal</button>
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

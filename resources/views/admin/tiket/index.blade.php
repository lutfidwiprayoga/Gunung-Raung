@extends('admin.layout.template')
@section('title', 'Data Tiket')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Tiket</h4>
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
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
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
                <h5><i class="icon fas fa-check"></i> error!</h5>
                {{ session('error') }}.
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('admin.tiket.create') }}" class="ml-auto btn btn-primary btn-round">
                                <i class="fa fa-plus"></i>
                                Tambah Tiket
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table-tiket" class="table display table-striped table-hover dataTable"
                                        role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Asuransi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($tiket as $data)
                                                <tr role="row" class="odd">
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>Rp. {{ number_format($data->harga) }}</td>
                                                    <td>Rp. {{ number_format($data->asuransi) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ route('admin.tiket.show', $data->id) }}"
                                                                type="button" data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Detail">
                                                                <i class="fas fa-info"></i>
                                                            </a>
                                                            <a href="{{ route('admin.tiket.edit', $data->id) }}"
                                                                type="button" data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-warning" data-original-title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
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
            $('#table-tiket').DataTable();
        });
    </script>

    {{-- delete data --}}
    @foreach ($tiket as $data)
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
                    <form action="{{ route('admin.tiket.destroy', $data->id) }}" method="POST">
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

@extends('admin.layout.template')
@section('title', 'User')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data User Wisatawan</h4>
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
                    <a href="#">Data Wisatawan</a>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="data-user" class="table display table-striped table-hover dataTable"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama User</th>
                                                    <th>Email</th>
                                                    <th>No Hp</th>
                                                    <th>Foto</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($wisatawan as $data)
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#data-user').DataTable();
        });
    </script>
    {{-- delete data --}}
    @foreach ($wisatawan as $data)
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
                        <form action="{{ route('admin.user.delete', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Tidak</button>
                            <button class="btn btn-danger">Ya, Hapus</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection

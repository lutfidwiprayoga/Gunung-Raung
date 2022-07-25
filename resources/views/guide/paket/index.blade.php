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
                                    <div class="col-sm-12">
                                        <table id="paket-perjalanan"
                                            class="table display table-striped table-hover dataTable" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Nama Paket Perjalanan</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Harga Perjalanan</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($guide as $data)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data->nama_paket }}</td>
                                                        <td>{{ date('l d F Y', strtotime($data->tanggal_mulai)) }}</td>
                                                        <td>{{ date('l d F Y', strtotime($data->tanggal_selesai)) }}</td>
                                                        <td>Rp. {{ number_format($data->harga_perjalanan) }}</td>
                                                        <td>{{ $data->keterangan }}</td>
                                                        <td>
                                                            @if ($data->status == 'Aktif')
                                                                <button class="btn btn-round btn-success btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#status{{ $data->id }}">{{ $data->status }}
                                                                </button>
                                                            @else
                                                                <button class="btn btn-round btn-danger btn-sm"
                                                                    data-target="#status{{ $data->id }}"
                                                                    data-toggle="modal">{{ $data->status }}
                                                                </button>
                                                            @endif
                                                        </td>
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
            $('#paket-perjalanan').DataTable();
        });
    </script>
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
    <!-- Update Status-->
    @foreach ($guide as $data)
        <div class="modal fade" id="status{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Status Paket Perjalanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('guide.perjalanan.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="date" name="tanggal_mulai" class="form-control form-control-alternative"
                                        value="{{ $data->tanggal_mulai }}">
                                    <input type="date" name="tanggal_selesai" class="form-control form-control-alternative"
                                        value="{{ $data->tanggal_selesai }}">
                                    <select class="form-control form-control-alternative" name="status" id="">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Belum aktif">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

@endsection

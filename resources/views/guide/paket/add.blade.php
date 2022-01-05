@extends('admin.layout.template')
@section('title', 'Harga Perjalanan Pemandu Jalur')

@section('contentadmin')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Harga Perjalanan</h4>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ Route('guide.perjalanan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nama Paket Perjalanan</label>
                                        <input type="text" name="nama_paket" class="form-control form-control-alternative"
                                            value="{{ old('nama_paket') }}">
                                        <div class="text-danger">
                                            @error('nama_paket')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Harga Paket</label>
                                        <input type="number" name="harga_perjalanan"
                                            class="form-control form-control-alternative"
                                            value="{{ old('harga_perjalanan') }}" placeholder="Rp. ">
                                        <div class="text-danger">
                                            @error('harga_perjalanan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Perjalanan Mulai</label>
                                        <input name="jadwal_mulai" type="date" id="date-input"
                                            class="form-control form-control-alternative" data-date-format="dd/mm/yyyy"
                                            value="{{ old('jadwal_mulai') }}">
                                        <div class="text-danger">
                                            @error('jadwal_mulai')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Perjalanan Selesai</label>
                                        <input name="jadwal_selesai" type="date" id="date-input"
                                            class="form-control form-control-alternative" data-date-format="dd/mm/yyyy"
                                            value="{{ old('jadwal_selesai') }}">
                                        <div class="text-danger">
                                            @error('jadwal_selesai')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Keterangan</label>
                                        <input name="keterangan" type="text" class="form-control form-control-alternative"
                                            value="{{ old('keterangan') }}">
                                        <div class="text-danger">
                                            @error('keterangan')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{ route('guide.perjalanan.index') }}" class="btn btn-link">
                                        <span class="btn-label">
                                            <i class="icon-action-undo"></i>
                                        </span>
                                        Kembali
                                    </a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

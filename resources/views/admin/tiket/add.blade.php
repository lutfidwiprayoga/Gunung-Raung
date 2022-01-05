@extends('admin.layout.template')
@section('title', 'Add Wisatawan')

@section('contentadmin')

    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.tiket.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nama </label>
                                        <input name="nama" class="form-control form-control-alternative"
                                            value="{{ old('nama') }}">
                                        <div class="text-danger">
                                            @error('nama')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Harga</label>
                                        <input name="harga" class="form-control form-control-alternative"
                                            value="{{ old('harga') }}">
                                        <div class="text-danger">
                                            @error('harga')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Asuransi</label>
                                        <input name="asuransi" class="form-control form-control-alternative"
                                            value="{{ old('asuransi') }}">
                                        <div class="text-danger">
                                            @error('asuransi')
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
                                    <a href="{{ route('admin.tiket.index') }}" class="btn btn-link btn-sm">
                                        <span class="btn-label">
                                            <i class="icon-action-undo"></i>
                                        </span>
                                        Kembali
                                    </a>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

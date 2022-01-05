@extends('admin.layout.template')
@section('title', 'EditlWisatawan')

@section('contentadmin')

    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.tiket.update', $tiket->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" class="form-control" value="{{ $tiket->nama }}">
                                    <div class="text-danger">
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input name="harga" class="form-control" value="{{ $tiket->harga }}">
                                    <div class="text-danger">
                                        @error('harga')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Asuransi </label>
                                    <input name="asuransi" class="form-control" id="date-input"
                                        value="{{ $tiket->asuransi }}">
                                    <div class="text-danger">
                                        @error('asuransi')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.tiket.index') }}" class="btn btn-link btn-sm">
                                        <span class="btn-label">
                                            <i class="icon-action-undo"></i>
                                        </span>
                                        Kembali
                                    </a>
                                    <button class="btn btn-primary"></a> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

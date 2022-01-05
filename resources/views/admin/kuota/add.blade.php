@extends('admin.layout.template')
@section('title', 'Add Kuota')

@section('contentadmin')

    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.kuota.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3>Tambahkan Kuota</h3>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label">Bulan & Tahun </label>
                                            <select name="periode_id" class="form-control form-control-alternative"
                                                id="exampleFormControlSelect">
                                                <option value="" disabled>Pilih Bulan & Tahun</option>
                                                @foreach ($periode as $period)
                                                    <option value="{{ $period->id }}">{{ $period->bulan }}</option>
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
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="form-group">
                                        <a href="{{ route('admin.kuota.index') }}" class="btn btn-link btn-sm">
                                            <span class="btn-label">
                                                <i class="icon-action-undo"></i>
                                            </span>
                                            Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

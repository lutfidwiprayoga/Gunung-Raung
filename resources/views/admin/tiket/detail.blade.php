@extends('admin.layout.template')
@section('title', 'Detail Tiket')

@section('contentadmin')

    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th width="100px">NAMA</th>
                                <th width="30px">:</th>
                                <th>{{ $tiket->nama }}</th>
                            </tr>

                            <tr>
                                <th width="100px">HARGA</th>
                                <th width="30px">:</th>
                                <th>{{ $tiket->harga }}</th>
                            </tr>

                            <tr>
                                <th width="100px">ASURANSI</th>
                                <th width="30px">:</th>
                                <th>{{ $tiket->asuransi }}</th>
                            </tr>

                            <tr>
                                <th>
                                    <a href="{{ route('admin.tiket.index') }}" class="btn btn-link">
                                        <span class="btn-label"><i class="icon-action-undo"></i>
                                        </span> Kembali
                                    </a>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

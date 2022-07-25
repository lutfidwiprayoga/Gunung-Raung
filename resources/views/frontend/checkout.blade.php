@extends('frontend.layout.template')
@section('title', 'Cek Status - Booking Online Gunung Raung')
@section('content')
    <div class="gtco-container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="card-checkout">
                    <div class="card-body-checkout btn-dark">
                        <div class="row">
                            @foreach ($pesanan as $item)
                                <div class="col-md-8">
                                    <table class="table-condensed">
                                        <tr id="status_id">
                                            <th width="50%">Status Pemesanan</th>
                                            <th width="30px">:</th>
                                            @if ($item->status_pemesanan == 'Ditolak')
                                                <th style="color: red" id="status">{{ $item->status_pemesanan }}</th>
                                            @elseif ($item->status_pemesanan == 'Pengajuan')
                                                <th style="color: orange" id="status">{{ $item->status_pemesanan }}</th>
                                            @else
                                                <th style="color: blue" id="status">{{ $item->status_pemesanan }}</th>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th width="50%">Kode Pemesanan</th>
                                            <th width="30px">:</th>
                                            <th>{{ $item->kode_pesanan }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Nama Ketua</th>
                                            <th width="30px">:</th>
                                            <th>{{ $item->wisatawan->nama }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Jumlah Anggota</th>
                                            <th width="30px">:</th>
                                            <th>{{ $item->jumlah_tiket }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Tanggal Pemesanan</th>
                                            <th width="30px">:</th>
                                            <th>{{ date('l, d-m-Y', strtotime($item->tanggal_pesan)) }} Pukul
                                                {{ date('H:i', strtotime($item->tanggal_pesan)) }} WIB
                                            </th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Tanggal Naik</th>
                                            <th width="30px">:</th>
                                            <th>{{ date('l, d-m-Y', strtotime($item->wisatawan->tanggal_naik)) }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Tanggal Turun</th>
                                            <th width="30px">:</th>
                                            <th>{{ date('l, d-m-Y', strtotime($item->wisatawan->tanggal_turun)) }}</th>
                                        </tr>
                                        <tr id="exp_id">
                                            <th width="50%">Maksimal Pembayaran</th>
                                            <th width="30px">:</th>
                                            <th>{{ date('l, d-m-Y', strtotime($item->maksimal_pembayaran)) }} Pukul
                                                {{ date('H:i', strtotime($item->maksimal_pembayaran)) }} WIB</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Nama Guide</th>
                                            <th width="30px">:</th>
                                            <th>{{ $item->wisatawan->perjalanan->user->name }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Total Biaya Tiket Masuk</th>
                                            <th width="30px">:</th>
                                            <th>Rp.{{ number_format($item->biaya_tiket) }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Total Biaya Guide</th>
                                            <th width="30px">:</th>
                                            <th>Rp.{{ number_format($item->biaya_guide) }}</th>
                                        </tr>
                                        <tr>
                                            <th width="50%">Total Yang Harus Dibayarkan</th>
                                            <th width="30px">:</th>
                                            <th>Rp. {{ number_format($item->total_harga) }}</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        style="min-height: 200px;background: #9eafeb;padding: 25px; border-radius: 20px; text-align: center">
                                        @if ($item->upload_bukti == null)
                                            <button class="btn btn-warning">Belum membayar</button>
                                        @else
                                            <button class="btn btn-success">Lunas</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@extends('admin.layout.template')
@section('title', 'EditlWisatawan')

@section('contentadmin')

    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.wisatawan.update', $pesanan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- ================== Data Transaksi =================-->
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h3><b>Data Pemesanan</b></h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tr>
                                                    <th width="100px">TANGGAL PEMESANAN</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ date('l, d-m-Y', strtotime($pesanan->tanggal_pesan)) }} Pukul
                                                        {{ date('H:i', strtotime($pesanan->tanggal_pesan)) }} WIB</th>
                                                </tr>
                                                <tr>
                                                    <th width="100px">MAKSIMAL PEMBAYARAN</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ date('l, d-m-Y', strtotime($pesanan->maksimal_pembayaran)) }}
                                                        Pukul
                                                        {{ date('H:i', strtotime($pesanan->maksimal_pembayaran)) }} WIB
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th width="100px">TANGGAL NAIK</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ $wisatawan->tanggal_naik }}</th>
                                                </tr>

                                                <tr>
                                                    <th width="100px">TANGGAL TURUN</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ $wisatawan->tanggal_turun }}</th>
                                                </tr>

                                                <tr>
                                                    <th width="100px">NAMA KETUA</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ $wisatawan->nama }}</th>
                                                </tr>

                                                <tr>
                                                    <th width="100px">KEBANGSAAN</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ $wisatawan->kebangsaan->negara }}</th>
                                                </tr>

                                                <tr>
                                                    <th width="100px">STATUS PEMESANAN</th>
                                                    <th width="30px">:</th>
                                                    <th>
                                                        <select name="status_pemesanan" class="form-control"
                                                            id="exampleFormControlSelect">
                                                            <option value="Pengajuan">Pengajuan</option>
                                                            <option value="Terdaftar">Terdaftar</option>
                                                            <option value="Ditolak">Ditolak</option>
                                                        </select>
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th width="100px">JUMLAH TIKET PEMESAN</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ $pesanan->jumlah_tiket }}</th>
                                                </tr>

                                                <tr>
                                                    <th width="100px">TOTAL BIAYA KESELURUHAN</th>
                                                    <th width="30px">:</th>
                                                    <th>Rp.{{ number_format($pesanan->total_harga) }}</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ================== Bukti Transfer=================-->
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <h3><b>Bukti Transfer</b></h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tr>
                                                    <th><img src="{{ url('upload_bukti/' . $pesanan->upload_bukti) }}"
                                                            width="500px">
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.wisatawan.index') }}" class="btn btn-warning btn-sm">
                        <span class="btn-label"><i class="icon-action-undo"></i>
                        </span> Kembali
                    </a>
                    <button class="btn btn-primary btn-sm" type="submit">Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection

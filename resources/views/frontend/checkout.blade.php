@extends('frontend.layout.template')
@section('title', 'checkout - Booking Online Gunung Raung')
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
                            <div class="col-md-8">
                                <table class="table-condensed">
                                    <tr id="status_id">
                                        <th width="50%">Status Pemesanan</th>
                                        <th width="30px">:</th>
                                        <th style="color: blue" id="status">{{ $pesanan->status_pemesanan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Kode Pemesanan</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pesanan->kode_pesanan }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Nama Ketua</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pesanan->wisatawan->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Jumlah Anggota</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pesanan->jumlah_tiket }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal Pemesanan</th>
                                        <th width="30px">:</th>
                                        <th>{{ date('l, d-m-Y', strtotime($pesanan->tanggal_pesan)) }} Pukul
                                            {{ date('H:i', strtotime($pesanan->tanggal_pesan)) }} WIB
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal Naik</th>
                                        <th width="30px">:</th>
                                        <th>{{ date('l, d-m-Y', strtotime($pesanan->wisatawan->tanggal_naik)) }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal Turun</th>
                                        <th width="30px">:</th>
                                        <th>{{ date('l, d-m-Y', strtotime($pesanan->wisatawan->tanggal_turun)) }}</th>
                                    </tr>
                                    <tr id="exp_id">
                                        <th width="50%">Maksimal Pembayaran</th>
                                        <th width="30px">:</th>
                                        <th>{{ date('l, d-m-Y', strtotime($pesanan->maksimal_pembayaran)) }} Pukul
                                            {{ date('H:i', strtotime($pesanan->maksimal_pembayaran)) }} WIB</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Nama Guide</th>
                                        <th width="30px">:</th>
                                        <th>{{ $pesanan->wisatawan->perjalanan->user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Biaya Tiket Masuk</th>
                                        <th width="30px">:</th>
                                        <th>Rp.{{ number_format($pesanan->biaya_tiket) }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Biaya Guide</th>
                                        <th width="30px">:</th>
                                        <th>Rp.{{ number_format($pesanan->biaya_guide) }}</th>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Yang Harus Dibayarkan</th>
                                        <th width="30px">:</th>
                                        <th>Rp. {{ number_format($pesanan->total_harga) }}</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center">Upload Bukti Pembayaran</p>
                                <form action="{{ route('booking.update', $pesanan->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input name="upload_bukti" type="file" id="upload_bukti"
                                        class="form-control-sm form-control-alternative"><br>
                                    <div class="text-center">
                                        <button class="btn-sm btn-primary">Upload</button>
                                    </div>
                                </form><br>
                                @if ($pdf != null)
                                    <a href="{{ route('admin.cetakpdf', $pdf->id) }}" class="btn-link btn-md"><i
                                            class="fas fa-file-pdf"></i> Cetak Tiket
                                        & Surat Pernyataan</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 style="font: Poppins Bold 22px;">Catat atau Simpan <b>Kode Pemesanan
                            anda.</b></h4>
                    <h4 style="font: Poppins Bold 22px; color: red;"><b>Batas waktu pembayaran anda 2
                            Jam setelah
                            pendaftaran.</b></h4>
                    <h4 style="font: Poppins Bold 22px;">Untuk mengantisipasi kesalahan/error pada
                        pembayaran, maka tidak
                        disarankan melakukan pembayaran pada jam 23.00 wib - 01.00 wib(tengah malam).</h4>
                </div>
            </div>
        </div>

        <!-- Exp Date dan waktu pembayaran -->
        <script>
            window.alert(
                "Pendaftaran Booking Online anda telah berhasil, Catat atau simpan Kode Pemesanan anda pada halaman setelah ini. Apabila tidak mendapatkan notifikasi email silahkan cek di halaman website booking Raung dengan memasukkan Kode Pemesanan dan verifikasi email ketua kelompok, silahkan download file pdf bukti cetak booking online jika sudah melakukan pembayaran untuk ditunjukkan ke petugas pintu masuk."
            );
        </script>
        <script>
            $(document).ready(function() {
                $('#status_id').change(function() {
                    $('#exp_id').val("");
                    if ($('#status input:selected').text() == "Pengajuan") {
                        $('#exp_id').show(150);
                    } else {
                        $('#exp_id').hide(150);
                    }
                });
            });
        </script>
    @endsection

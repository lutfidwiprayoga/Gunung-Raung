@extends('admin.layout.template')
@section('title', 'DetailWisatawan')

@section('contentadmin')

    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.cetakpdf', $pesanan->id) }}"><button class="btn btn-icon btn-round btn-primary"><i
                            class="fas fa-file-pdf"></i></button> CetakTiket </a><br>
                <div class="row">
                    <!-- ================== Data Transaksi =================-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3><b>Data Transaksi</b></h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <th width="100px">Kode Pemesanan</th>
                                                <th width="30px">:</th>
                                                <th>{{ $pesanan->kode_pesanan }}</th>
                                            </tr>
                                            <tr>
                                                <th width="100px">TANGGAL PEMESANAN</th>
                                                <th width="30px">:</th>
                                                <th>
                                                    {{ date('l, d F Y', strtotime($pesanan->tanggal_pesan)) }} Pukul
                                                    {{ date('H:i', strtotime($pesanan->tanggal_pesan)) }} WIB
                                                </th>
                                            </tr>

                                            <tr>
                                                <th width="100px">MAKSIMAL PEMBAYARAN</th>
                                                <th width="30px">:</th>
                                                <th>
                                                    {{ date('l, d F Y', strtotime($pesanan->maksimal_pembayaran)) }}
                                                    Pukul
                                                    {{ date('H:i', strtotime($pesanan->maksimal_pembayaran)) }} WIB
                                                </th>
                                            </tr>

                                            <tr>
                                                <th width="100px">TANGGAL NAIK</th>
                                                <th width="30px">:</th>
                                                <th>{{ date('l, d F Y', strtotime($wisatawan->kuota->tanggal_pendakian)) }}
                                                </th>
                                            </tr>

                                            <tr>
                                                <th width="100px">TANGGAL TURUN</th>
                                                <th width="30px">:</th>
                                                <th>{{ date('l, d F Y', strtotime($wisatawan->tanggal_turun)) }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">STATUS PEMESANAN</th>
                                                <th width="30px">:</th>
                                                <th>{{ $pesanan->status_pemesanan }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">BIAYA TIKET</th>
                                                <th width="30px">:</th>
                                                <th>Rp.{{ number_format($pesanan->biaya_tiket) }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">BIAYA GUIDE</th>
                                                <th width="30px">:</th>
                                                <th>Rp.{{ number_format($pesanan->biaya_guide) }}</th>
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

                                            <tr>
                                                <th width="100px">BUKTI PEMBAYARAN</th>
                                                <th width="30px">:</th>
                                                <th><img src="{{ url('upload_bukti/' . $pesanan->upload_bukti) }}"
                                                        width="100px">
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ================== Data Ketua =================-->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3><b>Data Ketua Kelompok</b></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th width="100px">JENIS IDENTITAS</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->jenis_identitas }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">NOMOR IDENTITAS</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->nomor_identitas }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">NAMA</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->nama }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">EMAIL</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->email }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">TANGGAL LAHIR</th>
                                                <th width="30px">:</th>
                                                <th>{{ date('d F Y', strtotime($wisatawan->tanggal_lahir)) }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">JENIS KELAMIN</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->jenis_kelamin }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">ALAMAT</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->alamat }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">NO HP</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->no_hp }}</th>
                                            </tr>
                                            @if ($wisatawan->asal_kota == null)
                                            @else
                                                <tr>
                                                    <th width="100px">ASAL KOTA</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ $wisatawan->city->name }}</th>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table">
                                            @if ($wisatawan->provinsi == null)
                                            @else
                                                <tr>
                                                    <th width="100px">PROVINSI</th>
                                                    <th width="30px">:</th>
                                                    <th>{{ $wisatawan->province->name }}</th>
                                                </tr>
                                            @endif

                                            <tr>
                                                <th width="100px">PEKERJAAN</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->pekerjaan }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">KEBANGSAAN</th>
                                                <th width="30px">:</th>
                                                <th>{{ $wisatawan->kebangsaan->negara }}</th>
                                            </tr>

                                            <tr>
                                                <th width="100px">FOTO IDENTITAS</th>
                                                <th width="30px">:</th>
                                                <th><img src="{{ url('foto_wisatawan/' . $wisatawan->foto_identitas) }}"
                                                        width="200px">
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- ================== Data Anggota =================-->
                        <div class="card">
                            <div class="card-body">
                                <h3><b>Data Anggota</b></h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped mt-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Jenis Identitas</th>
                                                    <th scope="col">Nomor Identitas</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Tanggal Lahir</th>
                                                    <th scope="col">Jenis Kelamin</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">No Hp</th>
                                                    <th scope="col">Kebangsaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($anggota as $angg)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $angg->jenis_identitas }}</td>
                                                        <td>{{ $angg->nomor_identitas }}</td>
                                                        <td>{{ $angg->nama }}</td>
                                                        <td>{{ date('d F Y', strtotime($angg->tanggal_lahir)) }}</td>
                                                        <td>{{ $angg->jenis_kelamin }}</td>
                                                        <td>{{ $angg->alamat }}</td>
                                                        <td>{{ $angg->no_hp }}</td>
                                                        <td>{{ $angg->kebangsaan->negara }}</td>
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
                <a href="{{ route('admin.riwayatwisatawan.index') }}" class="btn btn-link btn-sm">
                    <span class="btn-label"><i class="icon-action-undo"></i>
                    </span> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection

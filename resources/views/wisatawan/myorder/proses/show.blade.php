@extends('frontend.layout.template')
@section('title', 'Detail Wisatawan')

@section('content')
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <!-- ================== Data Transaksi =================-->
                    <div class="pl-sm-4">
                        <div class=" row">
                            <div class="card">
                                <div class="card-body">
                                    <h3 style="color: #575962">Data Transaksi</h3>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Kode Pemesanan</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $pesanan->kode_pesanan }}" type="text" id="input-first-name"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Status Pemesanan</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $pesanan->status_pemesanan }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Tanggal Pemesanan</label>
                                        <div class="col-sm-4">
                                            <input value="{{ date('l, d F Y', strtotime($pesanan->tanggal_pesan)) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Maksimal Pembayaran</label>
                                        <div class="col-sm-4">
                                            <input
                                                value="{{ date('l, d F Y', strtotime($pesanan->maksimal_pembayaran)) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Tanggal Naik</label>
                                        <div class="col-sm-4">
                                            <input
                                                value="{{ date('l, d F Y', strtotime($wisatawan->kuota->tanggal_pendakian)) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Tanggal Turun</label>
                                        <div class="col-sm-4">
                                            <input value="{{ date('l, d F Y', strtotime($wisatawan->tanggal_turun)) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Biaya Tiket</label>
                                        <div class="col-sm-4">
                                            <input value="Rp. {{ number_format($pesanan->biaya_tiket) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Biaya Guide</label>
                                        <div class="col-sm-4">
                                            <input value="Rp. {{ number_format($pesanan->biaya_guide) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Jumlah Tiket</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $pesanan->jumlah_tiket }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Total Keseluruhan</label>
                                        <div class="col-sm-4">
                                            <input value="Rp. {{ number_format($pesanan->total_harga) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Bukti Pembayaran</label>
                                        <div class="col-sm-4">
                                            @if ($pesanan->upload_bukti == null)
                                                <p>Anda Belum melakukan pembayaran</p>
                                            @else
                                                <button class="btn btn-primary btn-xs" data-target='#buktiPembayaran'
                                                    data-toggle="modal">Lihat Foto</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ================== Data Ketua =================-->
                    <div class="pl-sm-4">
                        <div class=" row">
                            <div class="card">
                                <div class="card-body">
                                    <h3 style="color: #575962">Data Ketua Kelompok</h3>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Jenis Identitas</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->jenis_identitas }}" type="text"
                                                id="input-first-name" class="form-control form-control-alternative"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Nomor Identitas</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->nomor_identitas }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Nama</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->nama }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Email</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->email }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Tanggal Lahir</label>
                                        <div class="col-sm-4">
                                            <input value="{{ date('d F Y', strtotime($wisatawan->tanggal_lahir)) }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->jenis_kelamin }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Alamat</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->alamat }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">No Hp</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->no_hp }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    @if ($wisatawan->asal_kota == null)
                                    @else
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Asal Kota</label>
                                            <div class="col-sm-4">
                                                <input value="{{ $wisatawan->city->name }}"
                                                    class="form-control form-control-alternative" readonly>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($wisatawan->provinsi == null)
                                    @else
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2">Provinsi</label>
                                            <div class="col-sm-4">
                                                <input value="{{ $wisatawan->province->name }}"
                                                    class="form-control form-control-alternative" readonly>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Kebangsaan</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->kebangsaan->negara }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Pekerjaan</label>
                                        <div class="col-sm-4">
                                            <input value="{{ $wisatawan->pekerjaan }}"
                                                class="form-control form-control-alternative" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label col-sm-2">Foto Identitas</label>
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary btn-xs" data-target='#fotoIdentitas'
                                                data-toggle="modal">Lihat Foto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ================== Data Anggota =================-->
                    <div class="pl-sm-4">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Data Anggota</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Jenis Identitas</th>
                                                        <th>Nomor Identitas</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Alamat</th>
                                                        <th>No Hp</th>
                                                        <th>Kebangsaan</th>
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
                                                            <td>{{ date('d F Y', strtotime($angg->tanggal_lahir)) }}
                                                            </td>
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
                    <div class="pl-sm-4 text-center">
                        <div class="row">
                            <a href="{{ route('myorder.index') }}" class="btn btn-link btn-md">
                                <span class="btn-label"><i class="fas fa-undo"></i>
                                </span> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Foto Identitas-->
    <div class="modal fade" id="fotoIdentitas" aria-hidden="true" aria-labelledby="fotoIdentitasLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fotoIdentitasLabel">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ url('foto_wisatawan/' . $wisatawan->foto_identitas) }}" width="100%" height="100%">
                </div>
            </div>
        </div>
    </div>
    <!--Modal Bukti Pembayaran-->
    <div class="modal fade" id="buktiPembayaran" aria-hidden="true" aria-labelledby="buktiPembayaranLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiPembayaranLabel">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ url('upload_bukti/' . $pesanan->upload_bukti) }}" width="100%" height="100%">
                </div>
            </div>
        </div>
    </div>
@endsection

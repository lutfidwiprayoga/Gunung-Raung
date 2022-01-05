<h2>Bukti Cetak</h2>
<h2>Tiket Pendaftaran Gunung Raung</h2>
<!-- ================== Data Transaksi =================-->
<h3>Data Transaksi</h3>
<table class="table">
    <tr>
        <th width="100px">KODE PEMESANAN</th>
        <th width="30px">:</th>
        <th>{{ $pdf->pesanan->kode_pesanan }}</th>
    </tr>
    <tr>
        <th width="100px">TANGGAL PEMESANAN</th>
        <th width="30px">:</th>
        <th>
            {{ date('l, d-m-Y', strtotime($pdf->pesanan->tanggal_pesan)) }} Pukul
            {{ date('H:i', strtotime($pdf->pesanan->tanggal_pesan)) }} WIB
        </th>
    </tr>
    <tr>
        <th width="100px">TANGGAL NAIK</th>
        <th width="30px">:</th>
        <th>{{ date('l, d-m-Y', strtotime($pdf->pesanan->wisatawan->tanggal_naik)) }}</th>
    </tr>

    <tr>
        <th width="100px">TANGGAL TURUN</th>
        <th width="30px">:</th>
        <th>{{ date('l, d-m-Y', strtotime($pdf->pesanan->wisatawan->tanggal_turun)) }}</th>
    </tr>

    <tr>
        <th width="100px">STATUS PEMESANAN</th>
        <th width="30px">:</th>
        <th><b>{{ $pdf->pesanan->status_pemesanan }}</b></th>
    </tr>
    <tr>
        <th width="100px">BIAYA TIKET</th>
        <th width="30px">:</th>
        <th>Rp.{{ number_format($pdf->pesanan->biaya_tiket) }}</th>
    </tr>

    <tr>
        <th width="100px">BIAYA GUIDE</th>
        <th width="30px">:</th>
        <th>Rp.{{ number_format($pdf->pesanan->biaya_guide) }}</th>
    </tr>

    <tr>
        <th width="100px">JUMLAH TIKET PEMESAN</th>
        <th width="30px">:</th>
        <th>{{ $pdf->pesanan->jumlah_tiket }}</th>
    </tr>

    <tr>
        <th width="100px">TOTAL BIAYA KESELURUHAN</th>
        <th width="30px">:</th>
        <th>Rp.{{ number_format($pdf->pesanan->total_harga) }}</th>
    </tr>
</table>
<!-- ================== Data Ketua =================-->
<h3>Data Ketua Kelompok</h3>
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
        <th>{{ date('d-m-Y', strtotime($wisatawan->tanggal_lahir)) }}</th>
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

    <tr>
        <th width="100px">ASAL KOTA</th>
        <th width="30px">:</th>
        <th>{{ $wisatawan->asal_kota }}</th>
    </tr>
    <tr>
        <th width="100px">PROVINSI</th>
        <th width="30px">:</th>
        <th>{{ $wisatawan->provinsi }}</th>
    </tr>

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
        <th><img src="{{ url('foto_wisatawan/' . $wisatawan->foto_identitas) }}" width="200px">
        </th>
    </tr>
</table>
<!-- ================== Data Anggota =================-->
<h3>Data Anggota</h3>
<table class="table" style="border: 1px">
    <thead>
        <tr>
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
        @foreach ($anggota as $angg)
            <tr>
                <td>{{ $angg->jenis_identitas }}</td>
                <td>{{ $angg->nomor_identitas }}</td>
                <td>{{ $angg->nama }}</td>
                <td>{{ date('d-m-Y', strtotime($angg->tanggal_lahir)) }}</td>
                <td>{{ $angg->jenis_kelamin }}</td>
                <td>{{ $angg->alamat }}</td>
                <td>{{ $angg->no_hp }}</td>
                <td>{{ $angg->kebangsaan->negara }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

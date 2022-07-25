<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10px;
            font-family: 'poppins, san-serif';
            font-weight: normal
        }

    </style>
    <center>
        <h5>Bukti Cetak</h5>
        <h5>Tiket Pendaftaran Gunung Raung</h5>
    </center>
    <!-- ================== Data Transaksi =================-->
    <h6>Data Transaksi</h6>
    <table>
        <tr>
            <th width="100px">KODE PEMESANAN</th>
            <th width="30px">:</th>
            <th style="font-weight: normal">{{ $data['kode_pesanan'] }}</th>
        </tr>
        <tr>
            <th width="100px">TANGGAL PEMESANAN</th>
            <th width="30px">:</th>
            <th>
                {{ date('l, d F Y', strtotime($data['tanggal_pesan'])) }} Pukul
                {{ date('H:i', strtotime($data['tanggal_pesan'])) }} WIB
            </th>
        </tr>
        <tr>
            <th width="100px">TANGGAL NAIK</th>
            <th width="30px">:</th>
            <th>{{ date('l, d F Y', strtotime($data['tanggal_naik'])) }}</th>
        </tr>

        <tr>
            <th width="100px">TANGGAL TURUN</th>
            <th width="30px">:</th>
            <th>{{ date('l, d F Y', strtotime($data['tanggal_turun'])) }}</th>
        </tr>
        <tr>
            <th width="100px">STATUS PEMESANAN</th>
            <th width="30px">:</th>
            <th><b>{{ $data['status_pemesanan'] }}</b></th>
        </tr>
        <tr>
            <th width="100px">NAMA PEMANDU JALUR</th>
            <th width="30px">:</th>
            <th>{{ $data['nama_guide'] }}</th>
        </tr>
        <tr>
            <th width="100px">PAKET YANG DIPILIH</th>
            <th width="30px">:</th>
            <th>{{ $data['paket_guide'] }}</th>
        </tr>
        <tr>
            <th width="100px">BIAYA TIKET</th>
            <th width="30px">:</th>
            <th>Rp.{{ number_format($data['biaya_tiket']) }}</th>
        </tr>
        <tr>
            <th width="100px">BIAYA TIKET</th>
            <th width="30px">:</th>
            <th>Rp.{{ number_format($data['biaya_tiket']) }}</th>
        </tr>

        <tr>
            <th width="100px">BIAYA GUIDE</th>
            <th width="30px">:</th>
            <th>Rp.{{ number_format($data['biaya_guide']) }}</th>
        </tr>

        <tr>
            <th width="100px">JUMLAH TIKET PEMESAN</th>
            <th width="30px">:</th>
            <th>{{ $data['jumlah_tiket'] }}</th>
        </tr>

        <tr>
            <th width="100px">TOTAL BIAYA KESELURUHAN</th>
            <th width="30px">:</th>
            <th>Rp.{{ number_format($data['total_harga']) }}</th>
        </tr>
    </table>
    <!-- ================== Data Ketua =================-->
    <h6>Data Ketua Kelompok</h6>
    <table>
        <tr>
            <th width="100px">JENIS IDENTITAS</th>
            <th width="30px">:</th>
            <th>{{ $data['jenis_identitas'] }}</th>
        </tr>
        <tr>
            <th width="100px">NOMOR IDENTITAS</th>
            <th width="30px">:</th>
            <th>{{ $data['nomor_identitas'] }}</th>
        </tr>

        <tr>
            <th width="100px">NAMA</th>
            <th width="30px">:</th>
            <th>{{ $data['nama'] }}</th>
        </tr>

        <tr>
            <th width="100px">EMAIL</th>
            <th width="30px">:</th>
            <th>{{ $data['email'] }}</th>
        </tr>

        <tr>
            <th width="100px">TANGGAL LAHIR</th>
            <th width="30px">:</th>
            <th>{{ date('d F Y', strtotime($data['tanggal_lahir'])) }}</th>
        </tr>

        <tr>
            <th width="100px">JENIS KELAMIN</th>
            <th width="30px">:</th>
            <th>{{ $data['jenis_kelamin'] }}</th>
        </tr>

        <tr>
            <th width="100px">ALAMAT</th>
            <th width="30px">:</th>
            <th>{{ $data['alamat'] }}</th>
        </tr>

        <tr>
            <th width="100px">NO HP</th>
            <th width="30px">:</th>
            <th>{{ $data['no_hp'] }}</th>
        </tr>
        @if ($wisatawan->asal_kota != null)
            <tr>
                <th width="100px">ASAL KOTA</th>
                <th width="30px">:</th>
                <th>{{ $data['asal_kota'] }}</th>
            </tr>
        @else
            {{-- Data tidak ada --}}
        @endif
        @if ($wisatawan->provinsi != null)
            <tr>
                <th width="100px">PROVINSI</th>
                <th width="30px">:</th>
                <th>{{ $data['provinsi'] }}</th>
            </tr>
        @else
            {{-- Data tidak ada --}}
        @endif

        <tr>
            <th width="100px">PEKERJAAN</th>
            <th width="30px">:</th>
            <th>{{ $data['pekerjaan'] }}</th>
        </tr>

        <tr>
            <th width="100px">KEBANGSAAN</th>
            <th width="30px">:</th>
            <th>{{ $data['kebangsaan'] }}</th>
        </tr>

        {{-- <tr>
                    <th>FOTO IDENTITAS : <img src="{{ url('foto_wisatawan/' . $data['foto_identitas']) }}" width="200px">
                    </th>
                </tr> --}}
    </table>
    <!-- ================== Data Anggota =================-->
    <h6>Data Anggota</h6>
    <table class="table table-bordered" style="border: 1px">
        <thead>
            <tr>
                <th style="font-weight: bold">Jenis Identitas</th>
                <th style="font-weight: bold">Nomor Identitas</th>
                <th style="font-weight: bold">Nama</th>
                <th style="font-weight: bold">Tanggal Lahir</th>
                <th style="font-weight: bold">Jenis Kelamin</th>
                <th style="font-weight: bold">Alamat</th>
                <th style="font-weight: bold">No Hp</th>
                <th style="font-weight: bold">Kebangsaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $item)
                <tr>
                    <td>{{ $item->jenis_identitas }}</td>
                    <td>{{ $item->nomor_identitas }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ date('d F Y', strtotime($item->tanggal_lahir)) }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->kebangsaan->negara }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

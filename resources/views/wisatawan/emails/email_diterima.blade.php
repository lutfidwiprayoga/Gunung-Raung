@component('mail::message')
    # Dear {{ $data['nama'] }}

    <p>Terima Kasih Atas Booking Online Gunung Raung Via Kalibaru Banyuwangi</p>
    <p>Bersama ini konfirmasi Data Booking Online anda sebagai berikut :</p><br>
    <table class="table-condensed">
        <tr>
            <th width="20%">Kode Pemesanan</th>
            <th width="10">:</th>
            <th>{{ $data['kode_pesanan'] }}</th>
        </tr>
        <tr>
            <th width="20%">Tanggal Pemesanan</th>
            <th width="10">:</th>
            <th>{{ $data['tanggal_pesan'] }}</th>
        </tr>
        <tr>
            <th width="20%">Nama Ketua Kelompok</th>
            <th width="10">:</th>
            <th>{{ $data['nama'] }}</th>
        </tr>
        <tr>
            <th width="20%">Nama Ketua Kelompok</th>
            <th width="10">:</th>
            <th>{{ $data['email'] }}</th>
        </tr>
        <tr>
            <th width="20%">Nama Ketua Kelompok</th>
            <th width="10">:</th>
            <th>{{ $data['no_hp'] }}</th>
        </tr>
        <tr>
            <th width="20%">Jumlah Anggota Kelompok</th>
            <th width="10">:</th>
            <th>{{ $data['jumlah_tiket'] }}</th>
        </tr>
        <tr>
            <th width="20%">Tanggal Naik</th>
            <th width="10">:</th>
            <th>{{ $data['tanggal_naik'] }}</th>
        </tr>
        <tr>
            <th width="20%">Tanggal Turun</th>
            <th width="10">:</th>
            <th>{{ $data['tanggal_turun'] }}</th>
        </tr>
        <tr>
            <th width="20%">Nama Guide</th>
            <th width="10">:</th>
            <th>{{ $data['nama_guide'] }}</th>
        </tr>
        <tr>
            <th width="20%">Status Guide</th>
            <th width="10">:</th>
            <th>Menyetujui</th>
        </tr>
        <tr>
            <th width="20%">Metode Pembayaran</th>
            <th width="10">:</th>
            <th>Via Transfer BNI</th>
        </tr>
    </table><br>
    <p>Mohon Segera lakukan Pembayaran sebelum :</p>

    <p style="font-weight: bold; text-transform: capitalize">Tanggal :{{ $data['maksimal_pembayaran'] }}</p>
    <p>a.n : <b> mtraung3344mdpldwonorejo BNI</b></p>
    <p>Jumlah yang Dibayar : <b>Rp. {{ $data['total_harga'] }}</b></p>

    <p style="font-weight: bold; text-transform: capitalize">Mohon dibayarkan sesuai dengan nominal tagihan Booking Online
        tersebut.</p>

    <p>
        <font color="red">Apabila Sudah membayar Mohon segera Upload Bukti TF pada menu myorder anda.</font>
    </p>

    Thanks,
    Sekretariat Mt. Raung 3344 Mdpl Via Kalibaru Banyuwangi
@endcomponent

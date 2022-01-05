@component('mail::message')
    # Dear {{ $item['nama_guide'] }}

    Anda Mendapatkan Perjalanan Masuk Silahkan Cek di Akun Guide anda di Website
    <a href="{{ route('guide.dashboard') }}">Booking Online Gunung Raung Via Kalibaru Banyuwangi</a>

    Thanks,<br>
    Sekretariat Mt. Raung 3344 Mdpl Via Kalibaru Banyuwangi
@endcomponent

@extends('frontend.layout.template')

@section('title', 'MyOrder')

@section('content')
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab">
                        <h3>Booking Transaksi</h3>
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home1" role="tabpanel1"
                                    aria-selected="false">Proses ({{ $notif1->count() }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home2" role="tabpanel2"
                                    aria-selected="false">Sedang Mendaki ({{ $notif2->count() }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home3" role="tabpanel2"
                                    aria-selected="false">Selesai ({{ $notif3->count() }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home4" role="tabpanel3"
                                    aria-selected="false">Dibatalkan ({{ $notif4->count() }})</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!--Pesanan Proses-->
                            <div class="tab-pane fade" id="home1" role="tabpanel">
                                <div class="pd-20">
                                    @forelse ($notif1 as $ps1)
                                        <div class="card-light">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div id="add-row_wrapper"
                                                        class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table table-responsive">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th>No</th>
                                                                            <th>Kode Pemesanan</th>
                                                                            <th>Status Pemesanan</th>
                                                                            <th>Tanggal Pesan</th>
                                                                            <th>Total Bayar</th>
                                                                            <th>Maksimal Pembayaran</th>
                                                                            <th>Nama Ketua</th>
                                                                            <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 1; ?>
                                                                        <tr role="row" class="odd">
                                                                            <td>{{ $no++ }}</td>
                                                                            <td>
                                                                                <font color='#15a585'>
                                                                                    {{ $ps1->pesanan->kode_pesanan }}
                                                                                </font>
                                                                            </td>
                                                                            <td>
                                                                                <font color="orange">
                                                                                    {{ $ps1->pesanan->status_pemesanan }}
                                                                                </font>
                                                                            </td>
                                                                            <td>{{ date('l, d-m-Y', strtotime($ps1->pesanan->tanggal_pesan)) }}
                                                                                Pukul
                                                                                {{ date('H:i', strtotime($ps1->pesanan->tanggal_pesan)) }}
                                                                                WIB
                                                                            </td>
                                                                            <td>Rp.
                                                                                {{ number_format($ps1->pesanan->total_harga) }}
                                                                            </td>
                                                                            <td>{{ date('l, d-m-Y', strtotime($ps1->pesanan->maksimal_pembayaran)) }}
                                                                                Pukul
                                                                                {{ date('H:i', strtotime($ps1->pesanan->maksimal_pembayaran)) }}
                                                                                WIB
                                                                            </td>
                                                                            <td>{{ $ps1->pesanan->wisatawan->nama }}
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-button-action">
                                                                                    <a href="#"><button
                                                                                            class="btn btn-success btn-round btn-sm"><i
                                                                                                class="fa fa-info"></i></button>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @if ($ps1->pesanan->upload_bukti == null)
                                                                <div class="col-md-10">
                                                                    <p>
                                                                        <font color='grey'>Silahkan tekan tombol berikut
                                                                            untuk
                                                                            melakukan pembayaran anda.</font>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <button class="btn btn-success btn-round btn-sm"
                                                                        data-target="#pembayaranModal{{ $ps1->id }}"
                                                                        data-toggle="modal">Bayar
                                                                        Sekarang</button>
                                                                </div>
                                                            @else
                                                                <div class="col-md-10">
                                                                    <p>
                                                                        <font color='grey'>Terima Kasih Bukti transfer Anda
                                                                            sedang diproses</font>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Pesanan anda masih dalam proses</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <!--Sedang Mendaki-->
                            <div class="tab-pane fade" id="home2" role="tabpanel2">
                                <div class="pd-20">
                                    @foreach ($notif2 as $ps2)
                                        <div class="card-light">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div id="add-row_wrapper"
                                                        class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table table-responsive">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th>No</th>
                                                                            <th>Kode Pemesanan</th>
                                                                            <th>Status Pemesanan</th>
                                                                            <th>Tanggal Pesan</th>
                                                                            <th>Total Bayar</th>
                                                                            <th>Nama Ketua</th>
                                                                            <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 1; ?>
                                                                        <tr role="row" class="odd">
                                                                            <td>{{ $no++ }}</td>
                                                                            <td>
                                                                                <font color='#15a585'>
                                                                                    {{ $ps2->pesanan->kode_pesanan }}
                                                                                </font>
                                                                            </td>
                                                                            <td>
                                                                                <font color="#2185be">
                                                                                    {{ $ps2->pesanan->status_pemesanan }}
                                                                                </font>
                                                                            </td>
                                                                            <td>{{ date('l, d-m-Y', strtotime($ps2->pesanan->tanggal_pesan)) }}
                                                                                Pukul
                                                                                {{ date('H:i', strtotime($ps2->pesanan->tanggal_pesan)) }}
                                                                                WIB
                                                                            </td>
                                                                            <td>Rp.
                                                                                {{ number_format($ps2->pesanan->total_harga) }}
                                                                            </td>
                                                                            <td>{{ $ps2->pesanan->wisatawan->nama }}
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-button-action">
                                                                                    <a href="#"><button
                                                                                            class="btn btn-success btn-round btn-sm"><i
                                                                                                class="fa fa-info"></i></button>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <p>
                                                                    <font color='grey'>Selamat menikmati pendakian anda
                                                                    </font>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="{{ route('myorder.edit', $ps2->id) }}"
                                                                    class="btn btn-success btn-round btn-sm">Akhiri
                                                                    Pendakian</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--Pesanan Selesai-->
                            <div class="tab-pane fade" id="home3" role="tabpanel2">
                                <div class="pd-20">
                                    @foreach ($notif3 as $ps)
                                        <div class="card-light">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div id="add-row_wrapper"
                                                        class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table table-responsive">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th>No</th>
                                                                            <th>Kode Pemesanan</th>
                                                                            <th>Status Pemesanan</th>
                                                                            <th>Tanggal Pesan</th>
                                                                            <th>Total Bayar</th>
                                                                            <th>Nama Ketua</th>
                                                                            <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 1; ?>
                                                                        <tr role="row" class="odd">
                                                                            <td>{{ $no++ }}</td>
                                                                            <td>
                                                                                <font color='#15a585'>
                                                                                    {{ $ps->pesanan->kode_pesanan }}
                                                                                </font>
                                                                            </td>
                                                                            <td>
                                                                                <font color="blue">
                                                                                    {{ $ps->pesanan->status_pemesanan }}
                                                                                </font>
                                                                            </td>
                                                                            <td>{{ date('l, d F Y', strtotime($ps->pesanan->tanggal_pesan)) }}
                                                                                Pukul
                                                                                {{ date('H:i', strtotime($ps->pesanan->tanggal_pesan)) }}
                                                                                WIB
                                                                            </td>
                                                                            <td>Rp.
                                                                                {{ number_format($ps->pesanan->total_harga) }}
                                                                            </td>
                                                                            <td>{{ $ps->pesanan->wisatawan->nama }}
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-button-action">
                                                                                    <a href="#"><button
                                                                                            class="btn btn-success btn-round btn-sm"><i
                                                                                                class="fa fa-info"></i></button>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <p>
                                                                    <font color='grey'>Nilai Pemesanan anda</font>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                @if ($rating)
                                                                    <button class="btn btn-success btn-round btn-sm"
                                                                        data-target="#ratingGuide{{ $ps->id }}"
                                                                        data-toggle="modal">Nilai</button>
                                                                @else
                                                                    <a href="/checklist"
                                                                        class="btn btn-success btn-round btn-sm">Booking
                                                                        Lagi</a>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Pesanan gagal -->
                        <div class="tab-pane fade" id="home4" role="tabpanel3">
                            <div class="pd-20">
                                @foreach ($notif4 as $ps4)
                                    <div class="card-light">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div id="add-row_wrapper"
                                                    class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-responsive">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th>No</th>
                                                                        <th>Kode Pemesanan</th>
                                                                        <th>Status Pemesanan</th>
                                                                        <th>Tanggal Pesan</th>
                                                                        <th>Total Bayar</th>
                                                                        <th>Maksimal Pembayaran</th>
                                                                        <th>Nama Ketua</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $no = 1; ?>
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $no++ }}</td>
                                                                        <td>
                                                                            <font color='#15a585'>
                                                                                {{ $ps4->pesanan->kode_pesanan }}
                                                                            </font>
                                                                        </td>
                                                                        <td>
                                                                            <font color="red">
                                                                                {{ $ps4->pesanan->status_pemesanan }}
                                                                            </font>
                                                                        </td>
                                                                        <td>{{ date('l, d-m-Y', strtotime($ps4->pesanan->tanggal_pesan)) }}
                                                                            Pukul
                                                                            {{ date('H:i', strtotime($ps4->pesanan->tanggal_pesan)) }}
                                                                            WIB
                                                                        </td>
                                                                        <td>Rp.
                                                                            {{ number_format($ps4->pesanan->total_harga) }}
                                                                        </td>
                                                                        <td>{{ date('l, d-m-Y', strtotime($ps4->pesanan->maksimal_pembayaran)) }}
                                                                            Pukul
                                                                            {{ date('H:i', strtotime($ps4->pesanan->maksimal_pembayaran)) }}
                                                                            WIB
                                                                        </td>
                                                                        <td>{{ $ps4->pesanan->wisatawan->nama }}
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-button-action">
                                                                                <a href="#"><button
                                                                                        class="btn btn-success btn-round btn-sm"><i
                                                                                            class="fa fa-info"></i></button>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <p>
                                                                <font color='grey'>Dibatalkan oleh anda</font>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="/checklist"
                                                                class="btn btn-success btn-round btn-sm">Booking
                                                                Lagi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Rating -->
    @foreach ($notif3 as $ps)
        <div class="modal fade" id="ratingGuide{{ $ps->id }}" aria-hidden="true"
            aria-labelledby="ratingGuideLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ratingGuideLabel">
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('booking.rating', $ps->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <h4 class="text-center">Beri Rating Guide
                            </h4><br><br>
                            <div class="wrap">
                                <div class="stars">
                                    <label class="rate">
                                        <input type="radio" name="rating" id="star1" value="1">
                                        <i class="far fa-star star one-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="rating" id="star2" value="2">
                                        <i class="far fa-star star two-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="rating" id="star3" value="3">
                                        <i class="far fa-star star three-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="rating" id="star4" value="4">
                                        <i class="far fa-star star four-star"></i>
                                    </label>
                                    <label class="rate">
                                        <input type="radio" name="rating" id="star5" value="5">
                                        <i class="far fa-star star five-star"></i>
                                    </label>
                                </div>
                            </div>
                            <h5>Berikan Ulasan</h5>
                            <textarea name="review" id="input-textarea" class="input-textarea"
                                placeholder="Berikan Komentar & Saran..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" style="width: 100%;">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Pembayaran -->
    @foreach ($notif1 as $ps1)
        <div class="modal fade" id="pembayaranModal{{ $ps1->id }}" aria-hidden="true"
            aria-labelledby="pembayaranModalLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pembayaranModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('booking.update', $ps1->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <h4 class="text-center">Pembayaran</h4>
                                <div class="col-sm-6 col-md-12">
                                    <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <img
                                                        src="https://i.ibb.co/C8RNBZ5/2425812-bank-bni-indonesia-indonesian-negara-icon.png">
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <h5 class="card-title">Metode Pembayaran</h5>
                                                        <h5 class="card-category" style="font-weight: bold">Transfer Bank
                                                            BNI
                                                        </h5>
                                                        <p class="card-category"
                                                            style="font-weight: normal;font-size: 14px">
                                                            015668122451
                                                        </p>
                                                        <p class="card-category"
                                                            style="font-weight: normal;font-size: 14px">
                                                            a/n mtraung3344mdpldwonorejo
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="detail-bayar">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5 class="card-judul text-center">Detail Pembayaran</h5>
                                                        <table class="table-condensed">
                                                            <tr>
                                                                <th width="50%" class="card-detail">Biaya Tiket Masuk
                                                                </th>
                                                                <th width="30px" class="card-detail">:</th>
                                                                <th class="card-detail">Rp.500.000</th>
                                                            </tr>
                                                            <tr>
                                                                <th width="50%" class="card-detail">Biaya Guide</th>
                                                                <th width="30px" class="card-detail">:</th>
                                                                <th class="card-detail">Rp.500.000</th>
                                                            </tr>
                                                            <tr>
                                                                <th width="50%" class="card-detail"
                                                                    style="font-weight: bold">Total Biaya</th>
                                                                <th width="30px" class="card-detail"
                                                                    style="font-weight: bold">:</th>
                                                                <th class="card-detail" style="font-weight: bold">
                                                                    Rp.1000.0000</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-center">Upload BuktiPembayaran</h4>
                                <div class="col-sm-6 col-md-12">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="detail-bayar">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input name="upload_bukti" type="file" id="input-first-name"
                                                            class="form-control-file text-center"
                                                            value="{{ old('upload_bukti') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" style="width: 100%;">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!--Rating & User Review-->
    <style>
        .wrap {
            width: 250px;
            height: 50px;
            position: absolute;
            top: 60px;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
        }

        .stars {
            width: fit-content;
            margin: 0 auto;
            cursor: pointer;
        }

        .star {
            color: #ffae00 !important;
        }

        .rate {
            height: 50px;
            margin-left: -5px;
            padding: 5px;
            font-size: 30px;
            position: relative;
            cursor: pointer;
        }

        .rate input[type="radio"] {
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 0%);
            pointer-events: none;
        }

        .star-over::after {
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 16px;
            content: "\f005";
            display: inline-block;
            color: #d3dcff;
            z-index: 1;
            position: absolute;
            top: 17px;
            left: 10px;
        }

    </style>
    <script>
        $(function() {

            $(document).on({
                mouseover: function(event) {
                    $(this).find('.far').addClass('star-over');
                    $(this).prevAll().find('.far').addClass('star-over');
                },
                mouseleave: function(event) {
                    $(this).find('.far').removeClass('star-over');
                    $(this).prevAll().find('.far').removeClass('star-over');
                }
            }, '.rate');


            $(document).on('click', '.rate', function() {
                if (!$(this).find('.star').hasClass('rate-active')) {
                    $(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
                    $(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
                    $(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
                } else {
                    console.log('has');
                }
            });

        });
    </script>
@endsection

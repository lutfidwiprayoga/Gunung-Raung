@extends('frontend.layout.template')
@section('title', 'Booking Online Gunung Raung')
@section('content')

    @if (session('successMsg'))
        <div class="alert alert-icon alert-success alert-dismissable fade-in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-check-all"></i>
            <strong>{{ session('successMsg') }}</strong>
        </div>
    @endif

    <header class="gtco-cover" role="banner">
        <div class="gtco-container">
            <div class="row">
                <div class="text-left col-md-12 col-md-offset-0">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="row">
                                <div class="col-md-12 copy animate-box">
                                    <h3>Selamat Datang di</h3>
                                    <h1>Website Resmi Gunung Raung</h1>
                                    <h3>Via Kalibaru Banyuwangi</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="text-center col-md-8 col-md-offset-2 gtco-heading">
                    <h2>Booking Online Gunung Raung</h2>
                    <p>Booking online dilakukan selama 24 jam, cermati tata cara dan aturan sesuai dengan
                        prosedur yang sudah ditetapkan. Disarankan untuk booking dan pembayaran dilakukan jauh hari
                        sebelum tanggal pendakian.</p>
                    <p><a href="/checklist" class="btn btn-success btn-round">Booking Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- END .gtco-services -->
@endsection

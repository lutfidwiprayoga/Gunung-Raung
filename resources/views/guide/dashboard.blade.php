@extends('admin.layout.template')
@section('title', 'Home')

@section('contentadmin')

    <div class="page-inner">
        @if (session('successMsg'))
            <div class="alert alert-icon alert-success alert-dismissable fade-in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-check-all"></i>
                <strong>{{ session('successMsg') }}</strong>
            </div>
        @endif
        <div class="page-header">
            <h4 class="page-title">Data Pemasukan Guide Gunung Raung</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/guide/dashboard">Base</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-sm-4 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="text-center icon-big icon-primary bubble-shadow-small">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="ml-3 col col-stats ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Paket Perjalanan</p>
                                    <h4 class="card-title">{{ $perjalanan->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="text-center icon-big icon-primary bubble-shadow-small">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="ml-3 col col-stats ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Perjalanan Tercapai</p>
                                    <h4 class="card-title">{{ $perjalanantercapai->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Jumlah Pendaftaran Pendakian Gunung Raung</div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="htmlLegendsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

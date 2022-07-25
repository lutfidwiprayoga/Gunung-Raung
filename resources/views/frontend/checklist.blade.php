@extends('frontend.layout.template')
@section('title', 'checklist - Booking Online Gunung Raung')

@section('content')
    <div class="gtco-container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checklist</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature-box">
                                <div class="feature-box-icon primary-bg"></div>
                                <div class="feature-box-info">
                                    <h3 class="heading-secondary mb-none text-center"><i class="fas fa-check-circle"></i>
                                        Isilah <i>Check List</i> Persyaratan Pendakian Gunung Raung dibawah ini:
                                    </h3>
                                </div>
                            </div>
                            <div style="padding-left: 15px;">
                                <div class="features">
                                    <div>
                                        <ul>
                                            <li>
                                                <label class="form-check-label" style="text-indent: -16px;">
                                                    <input type="checkbox" class="check" oninput="validasi()"
                                                        id="check"> Menunjukan Bukti
                                                    Cetak Pendaftaran Booking Online dari Sekretariat Gunung Raung.
                                                </label>
                                            </li>
                                            <li>
                                                <label class="form-check-label" style="text-indent: -16px;">
                                                    <input type="checkbox" class="check" oninput="validasi()"
                                                        id="check"> Surat Keterangan
                                                    Sehat asli termasuk bebas dari ISPA, bertanda tangan dan berstempel
                                                    basah dari fasilitas pelayanan kesehatan dengan tujuan akan digunakan
                                                    sebagai persyaratan untuk melakukan pendakian Gunung Raung, yang berlaku
                                                    paling lama 3 (tiga) hari sebelum hari pendakian.
                                                </label>
                                            </li>
                                            <li>
                                                <label class="form-check-label" style="text-indent: -16px;">
                                                    <input type="checkbox" class="check" oninput="validasi()"
                                                        id="check"> Membawa Fotokopy
                                                    KTP/KTM/Paspor yang masih berlaku.
                                                </label>
                                            </li>
                                            <li>
                                                <label class="form-check-label" style="text-indent: -16px;">
                                                    <input type="checkbox" class="check" oninput="validasi()"
                                                        id="check"> Setiap Pendaki
                                                    <b>WAJIB</b> menggunakan jasa <em>Tour</em> Guide.
                                                </label>
                                            </li>
                                            <li>
                                                <label class="form-check-label" style="text-indent: -16px;">
                                                    <input type="checkbox" class="check" oninput="validasi()"
                                                        id="check"> Pengunjung di
                                                    bawah 10 tahun <b>WAJIB </b> membawa surat ijin dari orang tua
                                                    bermaterai dan FotoCopy KTP orang tua.
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center btn-checklist">
                                <a href="{{ route('infokuota.index') }}">
                                    <input class="btn btn-success btn-round" type="submit" id="pendaftaran" value="Daftar"
                                        disabled="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("input[type=checkbox]").on("change", function(evt) {
            var check = $('input[class=check]:checked');
            if (check.length < 5) {
                $("input[id=pendaftaran]").prop("disabled", true);
            } else {
                $("input[id=pendaftaran]").prop("disabled", false);
            }
        });
    </script>
@endsection

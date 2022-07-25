<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Booking Online Gunung Raung Via Kalibaru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords"
        content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <link rel="icon" href="{{ asset('template_cube') }}/images/iconraung.svg" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template_cube') }}/air-datepicker/dist/css/datepicker.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/themify-icons.css">
    <!-- Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/magnific-popup.css">
    <script src="https://unpkg.com/vue@next"></script>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/owl.theme.default.min.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('template_cube') }}/css/style.css">
    <!-- Modernizr JS -->
    <script src="{{ asset('template_cube') }}/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('template_cube') }}/js/respond.min.js"></script>
    <script src="{{ asset('template_cube') }}/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('template_cube') }}/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="gtco-loader"></div>
    <div id="page">
        {{-- Navbar --}}
        @include('frontend.layout.navbar')
        {{-- END NAVBAR --}}

        {{-- Halaman Main --}}
        @yield('content')
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
        {{-- END MAIN --}}

        {{-- FOOTER --}}
        <footer id="gtco-footer" class="gtco-section" role="contentinfo">
            <div class="gtco-container">
                <div class="row row-pb-md">
                    <div class="text-center col-md-8 col-md-offset-2 gtco-cta">
                        <h3>Saran & Kritik</h3>
                        <p><a href="#" class="btn btn-white btn-outline">Kontak Kami</a></p>
                    </div>
                </div>
                <div class="row row-pb-md">
                    <div class="col-md-4 gtco-widget gtco-footer-paragraph">
                        <h3>Tahukan Anda?</h3>
                        <p>Gunung api Raung (G. Raung) adalah salah satu gunung api aktif tipe strato dengan tinggi
                            puncaknya 3332 meter diatas permukaan laut, secara geografis terletak pada posisi 7° 56.5'LS
                            dan 112° 37' BT dan secara administrasi termasuk kedalam wilayah Kabupaten Banyuwangi,
                            Kabupaten Bondowoso, dan Kabupaten Jember, Provinsi Jawa Timur. Gunung Raung sendiri
                            memiliki kaldera / kawah gunung terbesar di tanah jawa dan paling besar kedua se-indonesia
                            setelah gunung tambora, kaldera Gunung Raung sendiri memiliki keliling 6,5 km dengan
                            diameter 2 km dan bentuknya melingkar utuh seperti halnya Gunung Tambora.</p>
                    </div>
                    <div class="col-md-4 gtco-footer-link">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="gtco-list-link">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">SOP</a></li>
                                    <li><a href="#">Panduan</a></li>
                                    <li><a href="#">Pembayaran</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="gtco-list-link">
                                    <li><a href="#">Guide</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gtco-copyright">
                <div class="gtco-container">
                    <div class="row">
                        <div class="text-center col-md-12">
                            <p><small>&copy; Copyright 2021 Sekretariat Ayo Meraung | Dusun Wonorejo | author by
                                    @lutfidwiprayoga_</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- END FOOTER --}}
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fas fa-angle-double-up"></i></a>
    </div>

    <!-- Datepicker -->
    <script src="{{ asset('template_cube') }}/air-datepicker/dist/js/datepicker.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('template_cube') }}/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('template_cube') }}/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('template_cube') }}/js/jquery.easing.1.3.js"></script>
    <!-- Waypoints -->
    <script src="{{ asset('template_cube') }}/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="{{ asset('template_cube') }}/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('template_cube') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('template_cube') }}/js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="{{ asset('template_cube') }}/js/main.js"></script>

</body>

</html>

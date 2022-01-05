<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Gunung Raung Via Kalibaru</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('template_atlantis') }}/assets/img/iconraung.svg" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('template_atlantis') }}/assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="{{ asset('template_atlantis') }}/assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Quicksand:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('template_atlantis') }}/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function() {
            $("#date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy',
                language: 'id'
            });
        });
    </script>

    <!-- CSS Files -->
    {{-- <link rel="stylesheet" href="{{ asset('template_atlantis') }}/assets/datatables/datatables.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('template_atlantis') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template_atlantis') }}/assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpos{{ asset('template_atlantis') }}/'t include it in your project -->
    <link rel="stylesheet" href="{{ asset('template_atlantis') }}/assets/css/demo.css">
    <link rel="stylesheet" href="{{ asset('template_atlantis') }}/assets/air-datepicker/dist/css/datepicker.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                <a href="/home" class="logo">
                    <img src="{{ asset('template_atlantis') }}/assets/img/raungtop.svg" alt="navbar brand"
                        class="navbar-brand">
                </a>
                <button class="ml-auto navbar-toggler sidenav-toggler" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="pr-1 btn btn-search">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret submenu">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">{{ $notifikasi->count() }}</span>
                            </a>
                            @if (auth()->user()->level == 'guide')
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">{{ $notifikasi->count() }} Perjalanan Masuk
                                        </div>
                                    </li>
                                    <li>
                                        @foreach ($notifikasi as $item)
                                            <div class="notif-center">
                                                <a href="{{ route('guide.perjalananmasuk.show', $item->id) }}">
                                                    <div class="notif-icon notif-primary"> <i
                                                            class="fa fa-user"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            {{ $item->pesanan->wisatawan->nama }}
                                                        </span>
                                                        <span
                                                            class="time">{{ $item->created_at->diffForHumans() }}</span>
                                                    </div>
                                            </div>
                                        @endforeach
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all notifications<i
                                                class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            @else
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">{{ $notifikasi->count() }} Pesanan Masuk
                                        </div>
                                    </li>
                                    <li>
                                        @foreach ($notifikasi as $item)
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-icon notif-primary"> <i
                                                            class="fa fa-user"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            {{ $item->pesanan->wisatawan->nama }}
                                                        </span>
                                                        <span
                                                            class="time">{{ $item->created_at->diffForHumans() }}</span>
                                                    </div>
                                            </div>
                                        @endforeach
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all notifications<i
                                                class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                        <!--========= Navbar Foto Profil ==========--->
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('foto_profil/' . Auth::user()->foto) }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img
                                                    src="{{ asset('foto_profil/' . Auth::user()->foto) }}"
                                                    alt="image profile" class="rounded avatar-img"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('profil.edit') }}">Account
                                            Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <form id="logout" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a class="dropdown-item"><button type="submit"
                                                    class="btn btn-sm btn-primary btn-md">Logout
                                                </button></a>
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <!--========= End Navbar Foto Profil ==========--->
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->

        </div>
        <!-- Sidebar Account -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="float-left mr-2 avatar avatar-sm avatar-online">
                            <img src="{{ asset('foto_profil/' . Auth::user()->foto) }}" alt="..."
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {{ Auth::user()->name }}
                                    <span class="user-level">
                                        @if (auth()->user()->level == 'admin')
                                            Admin
                                        @elseif (auth()->user()->level == 'guide')
                                            Guide <i class="fas fa-star" style="color: orange;"></i>
                                            {{ $average_rating }}
                                        @endif
                                    </span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profil.edit') }}">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- tempat include sidebar --}}
                    @include('admin.layout.navbar')
                </div>
            </div>
        </div>
        <!-- End Sidebar Account -->

        <!--====================== Main Content ==========================-->
        <div class="main-panel">
            <div class="content">
                {{-- tempat taruh konten / master blade --}}
                @yield('contentadmin')
            </div>

            <!--================== Footer =========================-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="ml-auto copyright">
                        <p class="copyright">&copy; 2021 <a href="" target="_blank">Sekretariat Gn. Raung Dusun
                                Wonorejo</a>. All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
        <!--====================== End Main Content ==========================-->

    </div>
    <!--   Core JS Files   -->

    <script src="{{ asset('template_atlantis') }}/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="{{ asset('template_atlantis') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('template_atlantis') }}/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('template_atlantis') }}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ asset('template_atlantis') }}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js">
    </script>
    <!-- Sweet Alert -->
    <script src="{{ asset('template_atlantis') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="{{ asset('template_atlantis') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('template_atlantis') }}/assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('template_atlantis') }}/assets/js/setting-demo2.js"></script>
    <!--DataTables-->
    {{-- <script src="{{ asset('template_atlantis') }}/assets/datatables/datatables.min.js"></script> --}}
    <script src="{{ asset('template_atlantis') }}/assets/air-datepicker/dist/js/datepicker.js"></script>
</body>

</html>

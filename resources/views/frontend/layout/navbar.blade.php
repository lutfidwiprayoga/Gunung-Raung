<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
        <div class="row">
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-12">
                            <div id="gtco-logo"><a href="/"><img
                                        src="{{ asset('template_cube') }}/images/nav-raung3.svg"
                                        alt="Free HTML5 Website Template by FreeHTML5.co"></a>
                            </div>
                        </div>
                        <div class="text-left text-center col-xs-5 menu-1">
                            <ul>
                                <li><a href="/sop">SOP</a></li>
                                <li><a href="/panduan">Panduan Pemesanan</a></li>
                                <li><a href="/review">Testimoni</a></li>
                            </ul>
                        </div>
                        <div class="text-right col-xs-5 menu-1">
                            <ul>
                                <li>
                                    <form action="" class="search nav-form">
                                        <div class="input-group input-search">
                                            <input type="text" class="form-control-search" name="q" id="q"
                                                placeholder="Cek kode Booking">
                                        </div>
                                    </form>
                                </li>
                                <li class="has-dropdown">
                                    @guest
                                        <a href="#">Login/Register</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                            @endif
                                        @else
                                            <a href="#">{{ Auth::user()->name }}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('myorder.index') }}">My Order</a>
                                                </li>
                                                <li><a href="{{ route('profil.edit') }}">Setting</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="hidden">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </ul>
                                    @endguest
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                @php
                    $settings=DB::table('settings')->get();
                @endphp
                <a class="navbar-brand logo_h" href="{{ route('home') }}">
                    <img src="@foreach($settings as $data) {{ asset('frontend/img/logo.png') }} @endforeach" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item {{Request::path()=='/' ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::path()=='about' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item @if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif">
                            <a class="nav-link" href="{{ route('product-grids') }}">Shop</a>
                        </li>
                        <li class="nav-item {{ Request::path()=='blog' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item {{ Request::path()=='contact' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item">
                            <button>
                                <i class="ti-search"></i>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cart') }}">
                                <button>
                                    <i class="ti-shopping-cart"></i>
                                    <span class="nav-shop__circle">3</span>
                                </button>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <button>
                                    <i class="ti-location-pin"></i>
                                    <span class="nav-shop__circle">t</span>
                                </button>
                            </a>
                        </li>
                        @auth
                            @if(Auth::user()->role=='admin')
                                <li class="nav-item mr-0">
                                    <a class="button button-header" href="{{ route('admin') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item mr-0 {{ Request::path()=='user' ? 'active' : '' }}">
                                    <a class="button button-header" href="{{ route('user') }}">Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="button button-header bg-danger text-white" href="{{ route('user.logout') }}">Logout</a>
                            </li>
                        @else
                            <li class="nav-item mr-0 {{ Request::is('/signin') ? 'button-login' : '' }}">
                                <a class="button button-header" href="{{ route('login') }}">Sign In</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{ Request::is('/register') ? 'button-login' : '' }}">
                                    <a class="button button-header" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

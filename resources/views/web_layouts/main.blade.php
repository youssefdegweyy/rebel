<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="icon" href="{{ asset('web_assets/images/REBEL-LOGO.png') }}"/>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet"
    />

    <title>Rebel</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('web_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('web_assets/css/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('web_assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('web_assets/css/owl.css') }}"/>
    @yield('custom-css')
</head>

<body>
<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('web_assets/images/REBEL-LOGO.png') }}" alt=""/>
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home
                        </a>
                    </li>

                    <li class="nav-item {{ Request::routeIs('products') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('products') }}">Products
                        </a>
                    </li>

                    <li class="nav-item {{ Request::routeIs('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('contact-us') }}">Contact Us
                        </a>
                    </li>
                    @auth
                        <li class="nav-item {{ Request::routeIs('cart') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('cart') }}">Cart ({{ count(auth()->user()->cart) }})
                            </a>
                        </li>

                        <li class="nav-item {{ Request::routeIs('web-orders') || Request::routeIs('web-orders-single') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('orders') }}">
                                Orders
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link">Points: ({{ (auth()->user()->points) }})
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="nav-link"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                        this.closest('form').submit();" role="button">
                                    Logout
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item {{ Request::routeIs('signup') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('signup') }}">Sign Up
                            </a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('web-login') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('login') }}">Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright © 2023 REBEL EG</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('web_assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('web_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Additional Scripts -->
<script src="{{ asset('web_assets/js/custom.js') }}"></script>
<script src="{{ asset('web_assets/js/owl.js') }}"></script>
@yield('scripts')
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- REZ9I -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-chubby/css/uicons-thin-chubby.css'>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">BARBER<small>SHOP</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item @if(request()->routeIs('welcome') || request()->routeIs('home')) active @endif"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item @if(request()->routeIs('our_services')) active @endif"><a href="{{ route('our_services') }}" class="nav-link">Services</a></li>
                <li class="nav-item @if(request()->routeIs('our_packs')) active @endif"><a href="{{ route('our_packs') }}" class="nav-link">Packs</a></li>
                <li class="nav-item @if(request()->routeIs('our_packs')) active @endif"><a href="{{ route('our_packs') }}" class="nav-link">About</a></li>
                
                <li class="nav-item @if(request()->routeIs('allfeedbacks.index')) active @endif"><a href="{{ route('allfeedbacks.index') }}" class="nav-link">Feedbacks</a></li>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item @if(request()->routeIs('login')) active @endif"><a href="{{ route('login') }}" class="nav-link">login</a></li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item @if(request()->routeIs('register')) active @endif"><a href="{{ route('register') }}" class="nav-link">register</a></li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('mybookings') }}">
                                    Your Bookings
                                </a>
                                <div class="dropdown-divider"></div>
                            
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('myfeedbacks.index') }}">
                                Your Feedbacks
                            </a>
                            <div class="dropdown-divider"></div>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest



                </ul>
            </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5 text-center mx-auto">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p class="text-center">A great haircut isn't just about scissors and combs - it's about creating confidence one strand at a time.</p>
                    <ul class="ftco-footer-social list-unstyled d-flex justify-content-center mt-5">
                        <li class="ftco-animate"><a href="https://x.com/rHRILTtBpDIHwYF" target="_blank"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.facebook.com/yassir.karrouti.12" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.instagram.com/yassirkarrouti/?hl=en" target="_blank"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5 mb-md-5 mx-auto">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 mb-4">Have a Question ?</h2>
                    <div class="block-23 mb-3">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="icon icon-map-marker"></span>
                                <span class="text"><a href="https://www.google.com/maps/place/Coiffure+Oscar+Barber+Shop/@35.2448228,-3.9379918,17z/data=!4m10!1m2!2m1!1scoiffeur!3m6!1s0xd74314194db7d5b:0xe52b32f42aad92c4!8m2!3d35.2448228!4d-3.9346234!15sCghjb2lmZmV1cloKIghjb2lmZmV1cpIBEnVuaXNleF9oYWlyZHJlc3NlcpoBI0NoWkRTVWhOTUc5blMwVkpRMEZuU1VOeWJEbEVlRWhSRUFF4AEA-gEECAAQPQ!16s%2Fg%2F11j8k4mddd?entry=ttu&g_ep=EgoyMDI1MDQwOS4wIKXMDSoASAFQAw%3D%3D" target="_blank">10 Rue Allal el Fassi, Al Hoceïma 35000</a></span>
                            </li>
                            <li class="mb-3">
                                <a href="tel:+23923929210" class="text-decoration-none">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">+212 649157670</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@yourdomain.com" class="text-decoration-none">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">yassirkarrouti5@gmail.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
</body>
</html>

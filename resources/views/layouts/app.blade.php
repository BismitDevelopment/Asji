<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    
    @yield('script')
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!--Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css')}}">

    @yield('css')
</head>
<body>
    <div id="app">
        @yield('header')
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">{{ __('Events') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lectures.index') }}">{{ __('Public Lectures') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profiles.index') }}">{{ __('Members') }}</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('journals.index') }}">{{ __('Journals') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                                    @if (Auth::user()->profile)
                                        <a class="dropdown-item" href="{{ route('profiles.show', ['profile'=>Auth::user()->profile->id]) }}">Show Profile</a>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('jumbotron')
            <div class="container py-4">
                @yield('content')
            </div>
        </main>
        <div class="footer bg-dark text-white p-5">
            <div class="row">
                <div class="col-md-6 col-12 px-5">
                    <h6 class="font-weight-bold">Pusat Studi Jepang Universitas Indonesia</h6>
                    <p>Jl. Prof. DR. Selo Soemardjan, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat</p>
                    <p>16424</p>
                </div>
                <div class="col-sm-3 col-6 px-5">
                    <h6 class="font-weight-bold">Navigations</h6>
                    <a href="{{ route('home')}}"><p>Home</p></a>
                    <a href="{{ route('events.index')}}"><p>Event</p></a>
                    <a href="{{ route('lectures.index')}}"><p>Public Lecture</p></a>
                    <a href="{{ route('profiles.index')}}"><p>Member</p></a>
                </div>
                <div class="col-sm-3 col-6 px-5">
                    <h6 class="font-weight-bold">Quick Links</h6>
                    <p>Japan Foundation</p>
                </div>
            </div>
            <div class="copyright d-flex justify-content-center align-items-center">
                <span>Asosiasi Studi Jepang Indonesia</span>
                <img src="{{asset('icon/copyright.png')}}" style="margin:0 2px" alt="">
                <span>2020</span>
            </div>
        </div>
    </div>
</body>

</html>

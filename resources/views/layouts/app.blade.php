<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Baby Jotter') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="p-0 m-0">
        <!-- Banner Section -->
        <section id="bannerSection">
            <div class="container mt-3">
                <div class="row text-center justify-content-end bannerBorder">
                    <div class="col-2 order-2 align-self-start">
                        @guest
                            <a class="btn btn-block btn-light textPrimary mt-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="btn btn-block btn-light text-center textPrimary mt-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            @else
                                <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a> -->

                                <a class="btn btn-block text-white customBtn textPrimary mt-3" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    </div> -->
                        @endguest
                    </div>
                    <div class="col-9 order-1">
                        <img src="/images/_0005_Logo.png" alt="My Baby Jotter Logo" id="banner" class="p-3" height="250">
                    </div>
                </div>
            </div>
        </section>

        <!-- <nav class="navbar navbar-expand-md navbar-light navbar-dark text-white bg-transparent">
            <div class="container">
                <a class="navbar-brand h1" href="{{ url('/') }}">
                {{ config('app.name', 'My Baby Jotter') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
        <!-- Left Side Of Navbar -->
        <!-- <ul class="navbar-nav mr-auto"></ul> -->

        <!-- Right Side Of Navbar -->
        <!-- <ul class="navbar-nav ml-auto"> -->
        <!-- Authentication Links -->
        <!-- @guest
                            <li class="nav-item">
                                <a class="nav-link h3" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>

</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>Federal Polytechnic Ukana</title>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m" type="image/x-icon" />
    <link rel="apple-touch-icon" href="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: #4c5a7d !important;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img style="width:50px;height:50px" class="rounded-circle"
                    src="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m"

                    />
                    <span class="text-white"> Fed Poly Uka</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-warning border-warning border rounded-lg" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> 
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
</body>
</html>

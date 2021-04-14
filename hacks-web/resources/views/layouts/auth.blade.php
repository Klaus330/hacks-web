<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bureaucracy Hacks') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--  -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
</head>

<body>

    <div id="app">
        <main class="container-fluid p-0">
            <div class="row">
                @include('admin.components.navbar')
                <div class="col-11">
                    <div class="row">
                        <div id="header" class="header col-12">
                            <div class="logo">
                                <img src='/images/home/logo.svg' class="nav-image-size">
                            </div>
                            <div class="dropdown dropleft">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3">Admin</span>
                                    <img src='/images/svg/user.svg' class="imageAdmin dropdown-toggle "
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                </div>
                                <div class="dropdown-menu mr-2 dropdown-menu-left" aria-labelledby="dropdownMenuButton"
                                    aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
        </main>
    </div>
</body>

</html>
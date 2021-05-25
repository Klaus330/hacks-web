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
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"/>
</head>

<body>


<div id="app">

    @if(session()->has("succes"))
        <div class="alert alert-success position-fixed" style="bottom: 10px; right: 10px; z-index: 1000;">
            {{session()->get("succes")}}
        </div>
    @endif

    <main class="container-fluid p-0 overflow-hidden">
        <div class="row">
            @include('admin.components.navbar')
            <div class="col-lg-11 col-12 ">
                <div class="row">
                    <div id="header-admin" class="header-admin col-12">
                        <div class="logo">
                            <a href="/admin/dashboard">
                                <img src='/images/home/logo.svg' class="nav-image-size">
                            </a>
                        </div>
                        <div class="dropdown">
                            <div class="d-flex align-items-center dropdown-toggle" id="dropdownMenuButton"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 md-hidden">Admin</span>
                                <img src='/images/svg/user.svg' class="imageAdmin ">
                            </div>
                            <div class="dropdown-menu mr-2" aria-labelledby="dropdownMenuButton"
                                 aria-labelledby="dropdownMenuOffset">

                                <a class="dropdown-item" href="/user/settings">Setări</a>
                                <a class="dropdown-item content-desktop" href="/admin/institutions">Instituții</a>
                                <a class="dropdown-item content-desktop" href="/admin/documents">Documente</a>
                                <a class="dropdown-item content-desktop" href="/admin/departments">Departamente</a>
                                <a class="dropdown-item" href="#">
                                    <form action="/refresh-info">
                                        <button class="dropdown-item p-0">Actualizează informații</button>
                                    </form>

                                </a>
                                @if(session()->get('user')->institutions == [])
                                    <a class="dropdown-item" href="/admin/invite">Invită admin</a>
                                    <a class="dropdown-item" href="/admin/delete">Șterge admin</a>
                                @endif

                                <a class="dropdown-item" href="/logout">Delogare</a>

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

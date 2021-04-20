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

    <link rel="icon" href="/images/logo.png">
   <!--  -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app" style="overflow-x: hidden">
        <div class="main-image-container container-full">
            <img src="/images/home/corner-figure.png"  class="main-image" alt="">
        </div>
        @if(session()->has("succes"))
        <div class="alert alert-success position-fixed" style="bottom: 10px; right: 10px;">
            {{session()->get("succes")}}
        </div>
        @endif
        @include("includes/nav")
        <main class="py-4">
            @yield('content')
        </main>
        @include("includes/footer")
    </div>

</body>
</html>

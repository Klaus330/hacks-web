@extends('layouts.main')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center home-section mb-5">
        <div class="col-md-6 px-4">
            <h2 class="font-weight-bolder text-xl display-4"> Vă oferim cele mai bune soluții</h2>
            <p class="">
                Ajutor pentru procesele birocratice și documentele necesare
            </p>
            <a href="/documents" class="btn btn-accent-primary mt-4">Începe</a>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('/images/home/ilustration.svg') }}" alt="Path" class="home-section-image">
        </div>
    </div>
</div>

<div class="container-fluid container-fluid-background mt-5">
    <div class="p-5">
        <div class="align-feedback">
            <h2>Feedback-ul tău conteaza !</h2>
            <a href="/contact" class="btn button-accent-secondary">Oferă feedback</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row home-section d-flex justify-content-center align-items-center mb-5">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column mx-2">
            <span class="section-category">Serviciile noastre</span>
            <h2 class="text-center text-dark">Oferim servicii de înaltă calitate</h2>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="home-card position-relative">
                    <div class="row home-card-image-container">
                        <img src="{{ asset('/images/home/institution.svg') }}" alt="" class="home-card-image">
                    </div>
                    <div class="row">
                        <div class=" home-card-body">
                            <h4 class="home-card-title">Instituții</h4>
                            <a href="/institution" class="home-card-link button-accent-secondary">Mai mult</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="home-card position-relative">
                    <div class="row home-card-image-container">
                        <img src="{{ asset('/images/home/document.svg') }}" alt="" class="home-card-image">
                    </div>
                    <div class="row">
                        <div class=" home-card-body">
                            <h4 class="home-card-title">Documente</h4>
                            <a href="/documents" class="home-card-link button-accent-secondary">Mai mult</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="home-card position-relative">
                    <div class="row home-card-image-container">
                        <img src="{{ asset('/images/home/compass.svg') }}" alt="" class="home-card-image">
                    </div>
                    <div class="row">
                        <div class=" home-card-body">
                            <h4 class="home-card-title">Ghidare</h4>
                            <a href="/documents" class="home-card-link button-accent-secondary">Mai mult</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row home-mobile-section">
        <div class="col-12 mb-4  d-flex flex-column justify-content-center">
            <span class="section-category text-center">Mobile</span>
            <h2 class="text-dark text-center">Ne poți gasi și pe</h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 mobile-icon-container p-0">
                <a href="/" class="mobile-icon">
                    <img src="{{ asset('/images/home/google.png') }}" alt="Google Play">
                </a>
            </div>
{{--            <div class="col-12 col-md-6 mobile-icon-container">--}}
{{--                <a href="/" class="mobile-icon">--}}
{{--                    <img src="{{ asset('/images/home/apple.png') }}" alt="Apple Store">--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </div>
</div>

<!-- Carousel -->
<div class="home-carousel mt-10">
    <div id="carousel2" class="carousel slide text-center container mt-5" data-ride="carouse2">
        <div class="col-12 d-flex flex-column justify-content-center">
            <span class="section-category text-center">Echipa noastră</span>
            <h2 class="text-dark text-center">Bureaucracy Hacks</h2>
        </div>
        <!-- Wrapper for slides -->
        <team-slider></team-slider>
{{--        <div class="mt-4">--}}
{{--            <div class="carousel-inner" role="listbox">--}}
{{--                <div class='item active'>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-head">--}}
{{--                            <img src="https://scontent.fclj1-2.fna.fbcdn.net/v/t1.6435-9/42936450_2290085721062998_6650902933988704256_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=FLlDmFAk4rcAX9lnnDn&_nc_ht=scontent.fclj1-2.fna&oh=d05bf425dbade2f1f95b6717f8f38857&oe=60AF1A00"--}}
{{--                                alt="Thumbnail" class="circle-thumbnail">--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <strong class="text-center">Web Team Lead</strong>--}}
{{--                            <span>Claudiu Popa</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class='item'>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-head">--}}
{{--                            <img src="https://scontent.fclj1-2.fna.fbcdn.net/v/t1.6435-9/148577536_2390087264471406_48715920890472558_n.jpg?_nc_cat=104&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=oVMUAJOaK94AX9ya-eG&_nc_ht=scontent.fclj1-2.fna&oh=9ab54d7cdfcebfcdd25907eb2b5034d7&oe=60AE4E3C"--}}
{{--                                alt="" class="circle-thumbnail">--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <strong class="text-center">Backend Team Lead</strong>--}}
{{--                            <span>Cezar Andrei Todirișcă</span>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class='item'>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-head">--}}
{{--                            <img src="https://cdn.discordapp.com/avatars/319575679907921922/2b9fbc417ee5da65ab7aeaff0a9d8195.png?size=128"--}}
{{--                                alt="" class="circle-thumbnail">--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <strong class="text-center">Mobile Team Lead</strong>--}}
{{--                            <span>Eusebiu Gabriel Agachi</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class='item'>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-head">--}}
{{--                            <img src="https://scontent.fclj1-2.fna.fbcdn.net/v/t1.6435-9/148654087_3545847932192399_7528511697023032777_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=Rq8VnSkqpmcAX_pj2-k&_nc_ht=scontent.fclj1-2.fna&oh=32fe33b22bd2169b591be73898856159&oe=60AEAB51"--}}
{{--                                 alt="" class="circle-thumbnail">--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <strong class="text-center">API Team Lead</strong>--}}
{{--                            <span>Gabriela Murariu</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Left and right controls -->--}}
{{--            <a class="left carousel-control" href="#carousel2" role="button" data-slide="prev">--}}
{{--                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Previous</span>--}}
{{--            </a>--}}
{{--            <a class="right carousel-control" href="#carousel2" role="button" data-slide="next">--}}
{{--                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Next</span>--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>
</div>

@if(session()->has('success'))
<div class="position-fixed alert alert-success" style="bottom:10px; right:10px;">
    {{session()->get('success')}}
</div>
@endif
@endsection

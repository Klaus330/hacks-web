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
            <h2 class="font-weight-bolder text-xl display-4"> Provides you with the best Solutions</h2>
            <p class="">
                Help with bureaucratic processes and complicated paperwork
            </p>
            <a href="/documents" class="btn btn-accent-primary mt-4">Get stared</a>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('/images/home/ilustration.svg') }}" alt="Path" class="home-section-image">
        </div>
    </div>
</div>

<div class="container-fluid container-fluid-background mt-5">
    <div class="p-5">
        <div class="align-feedback">
            <h2>Feedback-ul tau conteaza !</h2>
            <a href="/contact" class="btn button-accent-secondary">Ofera feedback</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row home-section d-flex justify-content-center align-items-center mb-5">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column mx-2 mb-4">
            <span class="section-category">Our Services</span>
            <h2 class="text-center text-dark">We Provide Best Quality Service</h2>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="home-card position-relative">
                    <div class="row home-card-image-container">
                        <img src="{{ asset('/images/home/institution.svg') }}" alt="" class="home-card-image">
                    </div>
                    <div class="row">
                        <div class=" home-card-body">
                            <h4 class="home-card-title">Institutions</h4>
                            <p class="home-card-description">
                                More
                            </p>
                            <a href="/institution" class="home-card-link button-accent-secondary">Read More</a>
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
                            <h4 class="home-card-title">Documents</h4>
                            <p class="home-card-description">
                                More
                            </p>
                            <a href="/documents" class="home-card-link button-accent-secondary">Read More</a>
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
                            <h4 class="home-card-title">Guides</h4>
                            <p class="home-card-description">
                                More
                            </p>
                            <a href="/route" class="home-card-link button-accent-secondary">Read More</a>
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
            <h2 class="text-dark text-center">You can also find us here</h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mobile-icon-container p-0">
                <a href="/" class="mobile-icon">
                    <img src="{{ asset('/images/home/google.png') }}" alt="Google Play">
                </a>
            </div>
            <div class="col-12 col-md-6 mobile-icon-container">
                <a href="/" class="mobile-icon">
                    <img src="{{ asset('/images/home/apple.png') }}" alt="Apple Store">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Carousel -->
<div class="home-carousel">
    <div id="carousel2" class="carousel slide text-center container mt-5" data-ride="carouse2">
        <div class="col-12 d-flex flex-column justify-content-center">
            <span class="section-category text-center">Admins</span>
            <h2 class="text-dark text-center">Our opinions</h2>
        </div>
        <!-- Wrapper for slides -->
        <div style="padding-top: 50px;">
            <div class="carousel-inner" role="listbox">
                <div class='item active'>
                    <div class="card">
                        <div class="card-head">
                            <img src="https://images.pexels.com/photos/4058316/pexels-photo-4058316.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                alt="Thumbnail" class="circle-thumbnail">
                        </div>
                        <div class="card-body">
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt
                                doloribus esse impedit nihil temporibus! Aliqua</p>
                            <span>Natasa Rusu</span>
                        </div>
                    </div>
                </div>
                <div class='item'>
                    <div class="card">
                        <div class="card-head">
                            <img src="https://images.pexels.com/photos/1987301/pexels-photo-1987301.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                alt="" class="circle-thumbnail">
                        </div>
                        <div class="card-body">
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt
                                doloribus
                                esse impedit nihil temporibus! Aliqua</p>
                            <span>Elsa Camp</span>
                        </div>

                    </div>
                </div>
                <div class='item'>
                    <div class="card">
                        <div class="card-head">
                            <img src="https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                alt="" class="circle-thumbnail">
                        </div>
                        <div class="card-body">
                            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt
                                doloribus
                                esse impedit nihil temporibus! Aliqua</p>
                            <span>Serghei Olaf</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#carousel2" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel2" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

@if(session()->has('success'))
<div class="position-fixed alert alert-success" style="bottom:10px; right:10px;">
    {{session()->get('success')}}
</div>
@endif
@endsection
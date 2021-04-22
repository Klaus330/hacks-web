@extends('layouts.main')
@section('content')
<div class="container" style="margin-top: 15rem">
    <section class="docs-section ">
        <div>
            <h3 class="col-sm-5 docs-section-title text-center">Carte de identitate</h3>
        </div>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="docs-info-container">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Documente necesare

                        </a>
                        <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                            <li>
                                <label>
                                    <input type="checkbox"> Copie certificat nastere
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox"> Timbru
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox"> Cartea de identitate curenta
                                </label>
                            </li>

                        </ul>
                    </div>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Conditii generale

                        </a>

                        <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                            <li>Programare valida</li>
                            <li>Carte de identitate</li>
                            <li>Certificat de nastere</li>

                        </ul>
                    </div>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Instiutiile care
                            elibereaza

                        </a>

                        <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">
                            <li>
                                <label>
                                    <input type="checkbox"> Politia locala
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox"> Primaria
                                </label>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-9 mt-3">
                    <button type="button" class="btn btn-route">Creeaza ruta</button>
                </div>
            </div>
            <div class="col-md-4 sm-hidden ">
                <img class="docs-img" src="/images/svg/document.svg">
            </div>
    </section>
</div>

<div class="container">
    <div class="row">

        <div class="flex align-items-center col-12 col-md-12 mt-3">
            <h2 class="text-center text-color-blue">Traseul meu</h2>
        </div>

        <div class="col-12 col-md-12 mt-3">
            <div id="map-container-google-1" class="z-depth-1-half map-container">
                <iframe src="https://maps.google.com/maps?q=Iasi&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0"></iframe>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid container-fluid-background mt-10">
    <div class="p-5">
        <div class="align-feedback">
            <h2>Feedback-ul tau conteaza !</h2>
            <a href="#" class="btn button-accent-secondary">Ofera feedback</a>
        </div>
    </div>


</div>


<div class="container">
    <div class="row">

        <div class="flex align-items-center col-12 col-md-12 mt-5">
            <h2 class="text-center text-color-blue mb-3"> Timpul mediu de asteptare</h2>
        </div>
    </div>

    <statistics></statistics>

</div>


@endsection


@section('head')
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.69.1/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.69.1/maps/maps-web.min.js"></script>
<script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.69.1/services/services-web.min.js"></script>
@endsection

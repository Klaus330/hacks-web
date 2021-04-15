@extends('layouts.main')
@section('content')

    <div class="container mt-10">

        <div class="row">
            <div class="col-12 col-md-7">

                <div class="col-12 col-md-8 mt-5 mb-3 align-items-start">
                    <h2 class="text-left text-color-blue">Politia Sector2, Iasi</h2>
                </div>

                <div class="align-items-start flex-column col-12 col-md-8 text-color-black pl-2rem">
                    <div class="row mb-2">
                        <img class="mr-2" src="/images/svg/location.svg" />
                        <h5>Soseaua Mihai Bravu 129, Iasi</h5>
                    </div>
                    <div class="row mb-2">
                        <img class="mr-2" src="/images/svg/phone.svg" />
                        <h5>021316979</h5>
                    </div>
                    <div class="row mb-2">
                        <img class="mr-2" src="/images/svg/email.svg" />
                        <h5>politia@mai.ro</h5>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-12 col-md-10">
                        <div class="docs-info-container">

                            <dep-schedule>

                            </dep-schedule>

                        </div>
                    </div>
                </div>


            </div>

            <div class="col-12 col-md-4 sm-hidden d-flex align-items-center justify-content-center">
                <img style="width: 80%" src="{{asset('/images/svg/institution.svg')}}"/>
            </div>

        </div>

    </div>


    <div class="container-fluid container-fluid-background mt-5">
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
                <h2 class="text-center text-color-blue mb-3">Documente care pot fi procurate de la aceasta
                    institutie</h2>
            </div>

            <div class="flex col-12 col-md-12 ">
                <div class="container form-docs">
                    <ul>
                        <li>
                            Cazier judiciar
                        </li>
                        <li>
                            Carte de identitate
                        </li>
                        <li>
                            Viza arme letale
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


@endsection

@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h2 class="h3 mb-4 page-title ml-1">Setările contului</h2>
                <div class="my-4">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="false">Profilul meu</a>
                        </li>
                    </ul>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">

                                <label for="firstname">Prenume</label>
                                <input type="text" id="firstname" class="form-control" placeholder="" value={{session()->get("user")->surname}} />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Nume</label>
                                <input type="text" id="lastname" class="form-control" placeholder="Lastname" value={{session()->get("user")->name}} />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="email@gmail.com" value={{session()->get("user")->email}} />
                        </div>
                        <button type="submit" class="btn btn-primary">Salvează schimbările</button>
                    </form>

                    <form class="mt-5">
                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="false">Schimbă parola</a>
                            </li>
                        </ul>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPassword5">Parolă nouă</label>
                                    <input type="password" class="form-control" id="inputPassword5"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword6">Confirmă parola</label>
                                    <input type="password" class="form-control" id="inputPassword6"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Cerințele parolei</p>
                                <p class="small text-muted mb-2">Pentru a crea o nouă parolă, trebuie să respecți următoarele cerințe : </p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Minim 8 caractere</li>
                                    <li>Cel puțin un caracter special</li>
                                    <li>Cel puțin un număr</li>
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Schimbă parola</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

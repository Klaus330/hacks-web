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
                    <form action="/user/updatePersonalData" method="POST" >
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">Prenume</label>
                                <input type="text" id="firstname" class="form-control" name="surname" placeholder="" value={{session()->get("user")->surname}} />
                                @if($errors->has('surname'))
                                    <div class="text-danger">{{ $errors->first('surname') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Nume</label>
                                <input type="text" id="lastname" class="form-control" placeholder="Lastname" name="name" value={{session()->get("user")->name}} />
                                @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="email@gmail.com" name="email" value={{session()->get("user")->email}} />
                            @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="date-input">Data naștere:</label>
                            <input class="form-control" type="date" name="dataNastere" id="date-input" value="{{session()->get("user")->dataNastere}}" />
                            @if($errors->has('dataNastere'))
                                <div class="text-danger">{{ $errors->first('dataNastere') }}</div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judet">Județ:</label>
                                <input type="text" id="judet" class="form-control" name="judet" placeholder="Judetul" value="{{session()->get("user")->judet}}" />
                                @if($errors->has('judet'))
                                    <div class="text-danger">{{ $errors->first('judet') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="localitate">Localitate:</label>
                                <input type="text" id="localitate" class="form-control" name="localitate" placeholder="Localitatea" value="{{session()->get("user")->localitate}}" />
                                @if($errors->has('localitate'))
                                    <div class="text-danger">{{ $errors->first('localitate') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Adresa:</label>
                            <input class="form-control" type="text" id="address" name="address" value="{{session()->get("user")->address}}" />
                            @if($errors->has('address'))
                                <div class="text-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefon:</label>
                            <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="{{session()->get("user")->phone}}" />
                            @if($errors->has('phone'))
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="cnp">CNP:</label>
                            <input type="text" id="cnp" class="form-control" name="cnp"  pattern="[0-9]{13}" placeholder="1234567891234" value="{{session()->get("user")->cnp}}" />
                            @if($errors->has('cnp'))
                                <div class="text-danger">{{ $errors->first('cnp') }}</div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judet">Seria:</label>
                                <input type="text" id="judet" class="form-control" name="serieBuletin" pattern="[a-zA-Z]{2}" placeholder="XX" value="{{session()->get("user")->serieBuletin}}" />
                                @if($errors->has('serieBuletin'))
                                    <div class="text-danger">{{ $errors->first('serieBuletin') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="localitate">Numar:</label>
                                <input type="text" id="localitate" class="form-control" name="numarBuletin" pattern="[0-9]{6}" placeholder="123456" value="{{session()->get("user")->numarBuletin}}" />
                                @if($errors->has('numarBuletin'))
                                    <div class="text-danger">{{ $errors->first('numarBuletin') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" id="userId" class="form-control" name="userId"  value="{{session()->get("user")->userId}}" />
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
                                <p class="mb-2">Pentru a crea o nouă parolă, trebuie să respecți următoarele cerințe : </p>
                                <ul class="pl-4 mb-0">
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

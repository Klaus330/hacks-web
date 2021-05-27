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
                                <input type="text" id="firstname" class="form-control" name="surname" placeholder="" value={{session()->get('user')->surname??null}} />
                                @if($errors->has('surname'))
                                    <div class="text-danger">{{ $errors->first('surname') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Nume</label>
                                <input type="text" id="lastname" class="form-control" placeholder="Lastname" name="name" value={{session()->get('user')->name??null}} />
                                @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="email@gmail.com" name="email" value={{session()->get('user')->emai??null}} />
                            @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="date-input">Data naștere:</label>
                            <input class="form-control" type="date" name="dataNastere" id="date-input" value="{{session()->get('user')->dataNastere??null}}" />
                            @if($errors->has('dataNastere'))
                                <div class="text-danger">{{ $errors->first('dataNastere') }}</div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judet">Județ:</label>
                                <input type="text" id="judet" class="form-control" name="judet" placeholder="Judetul" value="{{session()->get('user')->judet??null}}" />
                                @if($errors->has('judet'))
                                    <div class="text-danger">{{ $errors->first('judet') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="localitate">Localitate:</label>
                                <input type="text" id="localitate" class="form-control" name="localitate" placeholder="Localitatea" value="{{session()->get('user')->localitate??null}}" />
                                @if($errors->has('localitate'))
                                    <div class="text-danger">{{ $errors->first('localitate') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Adresa:</label>
                            <input class="form-control" type="text" id="address" name="address" value="{{session()->get('user')->address??null}}" />
                            @if($errors->has('address'))
                                <div class="text-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefon:</label>
                            <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="{{session()->get('user')->phone??null}}" />
                            @if($errors->has('phone'))
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="cnp">CNP:</label>
                            <input type="text" id="cnp" class="form-control" name="cnp"  pattern="[0-9]{13}" placeholder="1234567891234" value="{{session()->get('user')->cnp??null}}" />
                            @if($errors->has('cnp'))
                                <div class="text-danger">{{ $errors->first('cnp') }}</div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="judet">Seria:</label>
                                <input type="text" id="judet" class="form-control" name="serieBuletin" pattern="[a-zA-Z]{2}" placeholder="XX" value="{{session()->get('user')->serieBuletin??null}}" />
                                @if($errors->has('serieBuletin'))
                                    <div class="text-danger">{{ $errors->first('serieBuletin') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="localitate">Numar:</label>
                                <input type="text" id="localitate" class="form-control" name="numarBuletin" pattern="[0-9]{6}" placeholder="123456" value="{{session()->get('user')->numarBuletin??null}}" />
                                @if($errors->has('numarBuletin'))
                                    <div class="text-danger">{{ $errors->first('numarBuletin') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" id="userId" class="form-control" name="userId"  value="{{session()->get('user')->userId??null}}" />
                        </div>


                        <button type="submit" class="btn btn-primary">Salvează schimbările</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection

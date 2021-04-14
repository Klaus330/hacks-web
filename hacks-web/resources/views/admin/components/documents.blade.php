
@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10 align-items-center justify-content-center">
            <div class="col-8">
                <select class="form-select">
                    <option selected>Institutie</option>
                    <option value="1">Politie</option>
                    <option value="2">Primarie</option>
                    <option value="3">ANAF</option>
                </select>
            </div>

            <div class="col-8 mt-3">
                <select class="form-select">
                    <option selected>Documente</option>
                    <option value="1">Buletin</option>
                    <option value="2">Certificat de nastere</option>
                    <option value="3">Cerere tip</option>
                </select>
            </div>

            <div class="col-12 mt-3 align-items-center justify-content-center">
            <button class="btn btn-primary">Modifica!</button>
            </div>
        </div>
    </div>
@endsection

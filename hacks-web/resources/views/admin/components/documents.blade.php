@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <select class="form-select">
                    <option selected>Institutie</option>
                    <option value="1">Politie</option>
                    <option value="2">Primarie</option>
                    <option value="3">ANAF</option>
                </select>
            </div>

            <div class="col-8 mt-2">
                <select class="form-select">
                    <option selected>Documente</option>
                    <option value="1">Buletin</option>
                    <option value="2">Certificat de nastere</option>
                    <option value="3">Cerere tip</option>
                </select>
            </div>
        </div>
    </div>
@endsection

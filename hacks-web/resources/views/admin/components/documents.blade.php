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

            <div class="col-8 mt-4">
                <select class="form-select">
                    <option selected>Documente</option>
                    <option value="1">Buletin</option>
                    <option value="2">Certificat de nastere</option>
                    <option value="3">Cerere tip</option>
                </select>
            </div>

            <form class="col-8 mt-10">
                <div class="form-group">
                    <textarea class="form-control" id="textarea-docs"></textarea>
                </div>

                <div class="col-12 mt-3 p-0">
                    <button type="submit" class="btn btn-primary">Modifica!</button>
                </div>
            </form>

        </div>

    </div>
@endsection

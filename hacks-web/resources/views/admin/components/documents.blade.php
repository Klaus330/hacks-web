@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10 align-items-center justify-content-center">
            <div class="col-8 select mb-3">
                <select name="slct" id="slct">
                    <option selected disabled>Institutie</option>
                    <option value="1">Politie</option>
                    <option value="2">Primarie</option>
                    <option value="3">Anaf</option>
                </select>
            </div>

            <div class="col-8 select">
                <select name="slct" id="slct">
                    <option selected disabled>Documente</option>
                    <option value="1">Buletin</option>
                    <option value="2">Certificat de nastere</option>
                    <option value="3">Cerere tip</option>
                </select>
            </div>

            <form class="col-8 mt-10">
                <div class="form-group col-12 p-0">
                    <label for="title">Title:</label>
                    <input id="title" class="form-control" type="text" name="title" placeholder="Title">

                </div>
                <div class="form-group">
                    <label for="textarea-docs">Informations:</label>
                    <textarea class="form-control" id="textarea-docs"></textarea>
                </div>

                <div class="col-12 mt-3 p-0">
                    <button type="submit" class="btn btn-primary">Modifica!</button>
                </div>
            </form>

        </div>

    </div>
@endsection

@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10 align-items-center justify-content-center">
            <div class="col-8 select mb-3">
                <select>
                    <option selected disabled>Institutie</option>
                    <option value="1">Politie</option>
                    <option value="2">Primarie</option>
                    <option value="3">ANAF</option>
                </select>
            </div>

            <div class="col-8 select">
                <select>
                    <option selected disabled>Departamentul</option>
                    <option value="1">Eliberare buletin</option>
                    <option value="2">Plati amenzi</option>
                    <option value="3">Eliberare pasaport</option>
                </select>
            </div>

            <form class="col-8 mt-10">
                <div class="form-group col-12 p-0">
                    <label for="name">Name:</label>
                    <input id="name" class="form-control" type="text" name="title" placeholder="Name">

                </div>
                <div class="form-group">
                    <label for="textarea-institutions">Informations:</label>
                    <textarea class="form-control" id="textarea-institutions"></textarea>
                </div>

                <div class="col-12 mt-3 p-0">
                    <button type="submit" class="btn btn-primary">Modifica!</button>
                </div>
            </form>

        </div>

    </div>
@endsection

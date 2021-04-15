@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10">
            <edit-page
                first-label="Institutions"
                second-label="Departament"
                first-url="/get-departments"
                second-url="/get-docs"
            ></edit-page>
        </div>

    </div>
@endsection

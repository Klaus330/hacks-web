@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10">
            <edit-institution-page
                first-label="Institutions"
                second-label="Departament"
                first-url="/get-institutions"
                second-url="/get-departments"
                first-placeholder="Care Institutie?"
                second-placeholder="Care departament?"
            ></edit-institution-page>
        </div>

    </div>
@endsection

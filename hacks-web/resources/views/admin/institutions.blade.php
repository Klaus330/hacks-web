@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10">
            <edit-page
                first-label="Institutions"
                second-label="Departament"
                first-url="/get-institutions"
                second-url="/get-departments"
                first-placeholder="Care Institutie?"
                second-placeholder="Care departament?"
            ></edit-page>
        </div>

    </div>
@endsection

@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10 ">
            <edit-department-page
                first-label="Institutia"
                second-label="Departamentul"
                first-url="/get-institutions"
                second-url="/get-departments"
                first-placeholder="Care Institutie?"
                second-placeholder="Care Departament?"
            ></edit-department-page>
        </div>
    </div>
@endsection

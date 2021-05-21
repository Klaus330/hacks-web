@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10 ">
            <edit-process-page
                first-label="Institutions"
                second-label="Proces birocratic"
                first-url="/get-institutions"
                second-url="/get-docs"
                first-placeholder="Care Instituție?"
                second-placeholder="Care proces?"
            ></edit-process-page>
        </div>
    </div>
@endsection

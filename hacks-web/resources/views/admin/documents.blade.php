@extends('layouts.auth')

@section('content')
    <div class="col-11 flex">
        <div class="row mt-10 ">
            <edit-process-page
                first-label="Institutions"
                second-label="Proces birocratic"
                first-url="/get-institutions"
                second-url="/get-docs"
                first-placeholder="Care Institutie?"
                second-placeholder="Care proces?"
                :institution-admin="{{json_encode(session()->get('user')->institutions)}}"
            ></edit-process-page>
        </div>
    </div>
@endsection

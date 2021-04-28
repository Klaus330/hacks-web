@extends('layouts.auth')

@section('content')
<div class="main-box-admin col-mr-5 col-11">

    <div class="row">
        <views class="col-12" v-bind:data="{{ json_encode($views) }}"></views>
    </div>
    <reviews-container></reviews-container>

</div>
@endsection
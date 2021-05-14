@extends('layouts.auth')

@section('content')
<div class="main-box-admin col-mr-5 col-11">

    <views v-bind:data="{{ json_encode($views) }}" v-bind:institution="{{json_encode(session()->get('user')->institutions)}}"></views>

    <reviews-container></reviews-container>

</div>
@endsection

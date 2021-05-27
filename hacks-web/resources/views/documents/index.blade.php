@extends('layouts.main')

@section('content')
    <processes-page :user-data="{{json_encode(session()->get('user') ?? null)}}"></processes-page>
@endsection

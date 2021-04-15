@extends('layouts.app')

@section('content')
    <section class="auth-section">
        <div class="auth-image-container">
            <div class="auth-image"></div>
        </div>
        <div class="auth-content ">
            <register-form :csrf-token="{{csrf_token()}}"></register-form>
            <div class="auth-link-container">
                <a class="auth-link" href="/login">I already have an account</a>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <section class="auth-section">
        <div class="auth-image-container">
            <div class="auth-image"></div>
        </div>
        <div class="auth-content ">
            <login-form crsf-token="{{csrf_token()}}"></login-form>

            <div class="auth-link-container">
                <a class="auth-link" href="/forgot-password">Ai uitat parola ?</a>
            </div>
        </div>
    </section>
@endsection

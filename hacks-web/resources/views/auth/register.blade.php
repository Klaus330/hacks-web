@extends('layouts.app')

@section('content')
    <section class="auth-section">
        <div class="auth-image-container">
            <div class="auth-image"></div>
        </div>
        <div class="auth-content ">
            <register-form csrf="{{ csrf_token() }}"></register-form>
            <div class="auth-link-container">
                <a class="auth-link" href="/login">Deja sunt înregistrat</a>
            </div>
        </div>
    </section>
@endsection

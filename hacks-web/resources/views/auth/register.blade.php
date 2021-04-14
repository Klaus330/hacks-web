@extends('layouts.auth')

@section('content')
    <section class="auth-section">
        <div class="auth-image-container">
            <div class="auth-image"></div>
        </div>
        <div class="auth-content ">
            <form class="login-form simple-form" action="/register" method="post">
                @csrf
                @if ($errors->any())
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="alert alert-danger col-12 col-lg-7">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="auth-item mb-4 col-12 col-lg-7">
                        <input type="text" name="name" placeholder="Name" class="input-form" required/>
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="auth-item mb-4 col-12 col-lg-7">
                        <input type="text" name="surname" placeholder="Surname" class="input-form" required/>
                        <span class="text-danger">@error('surname'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="auth-item mb-4 col-12 col-lg-7">
                        <input type="email" name="email" placeholder="email" class="input-form" required/>
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="auth-item mb-4 col-12 col-lg-7">
                        <input type="text" name="username" placeholder="username" class="input-form" required/>
                        <span class="text-danger">@error('username'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="auth-item mb-4 col-12 col-lg-7">
                        <input type="password" name="password" placeholder="password" class="input-form" required/>
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="auth-item mb-4 col-12 col-lg-7">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password"
                               class="input-form" required/>
                        <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="mb-4 col-12 col-lg-7 ">
                        <input type="checkbox" name="terms" required><span class="text-white ml-2">I agree to the terms & conditions</span>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="auth-item mb-4 col-12 col-lg-7">
                        <button class="auth-button">Create account</button>
                    </div>
                </div>

                <div class="auth-link-container">
                    <a class="auth-link" href="/login">I already have an account</a>
                </div>

        </div>
    </section>
@endsection

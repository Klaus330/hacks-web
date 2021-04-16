@extends('layouts.app')

@section('content')
    <section class="auth-section">
        <div class="auth-image-container">
            <div class="auth-image"></div>
        </div>

        <div class="container padding-bottom-3x mb-2 mt-10">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="forgot">
                        <h2>Forgot your password?</h2>
                        <p>Change your password in three easy steps. This will help you to secure your password!</p>
                        <ol class="list-unstyled">
                            <li><span class="text-color-white">1. </span>Enter your email address below.</li>
                            <li><span class="text-color-white">2. </span>Our system will send you a temporary link</li>
                            <li><span class="text-color-white">3. </span>Use the link to reset your password</li>
                        </ol>
                    </div>
                    <form class="card mt-4 col-12 col-md-10 col-lg-12  pl-md-0">
                        <div class="card-body">
                            <div class="form-group"><label for="email-for-pass">Enter your email address</label> <input
                                    class="input-form" placeholder="email" type="email" id="email-for-pass" required="">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn auth-button mb-3" type="submit">Get New Password</button>
                            <button class="btn auth-button" type="submit">Back to Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
@endsection

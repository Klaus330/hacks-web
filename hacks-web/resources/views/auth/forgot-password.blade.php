@extends('layouts.app')

@section('content')
    <section class="auth-section">
        <div class="auth-image-container">
            <div class="auth-image"></div>
        </div>

        <div class="container mb-2 mt-5">
            <div class="row justify-content-center forgot-container">
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

                    @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    <form class=" card mt-4 col-12 col-md-10 col-lg-12  pl-md-0" method="POST" action="/forgot-password">
                        @csrf
                        <div class="card-body">
                            <div class="form-group"><label for="email-for-pass">Introdu adresa de email</label> <input
                                    class="input-form" name="email" placeholder="email" type="email" id="email-for-pass" required="">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group"><label for="new-pass">Noua parola</label> <input
                                    class="input-form" name="newPassword" placeholder="parola" type="password" id="new-pass" required="">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group"><label for="confirm-new-pass">Confirma noua parola</label> <input
                                    class="input-form" name="confirmNewPassword" placeholder="confirma parola" type="password" id="confirm-new-pass" required="">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn auth-button mb-3" type="submit">Schimba parola</button>
                            <a class="btn auth-button" href="/login">Inapoi la login</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </section>
@endsection

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
                        <h2>Ți-ai uitat parola?</h2>
                        <p>Schimbă-ți parola în trei pași simpli.</p>
                        <ol class="list-unstyled">
                            <li><span class="text-color-white">1. </span>Introdu adresa de email</li>
                            <li><span class="text-color-white">2. </span>Vei primi un link de confirmare</li>
                            <li><span class="text-color-white">3. </span>Accesează link-ul pentru a reseta parola</li>
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
                            <div class="form-group"><label for="new-pass">Noua parolă</label> <input
                                    class="input-form" name="newPassword" placeholder="parola" type="password" id="new-pass" required="">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group"><label for="confirm-new-pass">Confirmă noua parolă</label> <input
                                    class="input-form" name="confirmNewPassword" placeholder="confirma parola" type="password" id="confirm-new-pass" required="">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn auth-button mb-3" type="submit">Schimbă parola</button>
                            <a class="btn auth-button" href="/login">Înapoi la login</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </section>
@endsection

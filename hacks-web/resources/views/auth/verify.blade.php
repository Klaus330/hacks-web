@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificați Adresa Dumneavoastră De Email') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link nou de verificare v-a fost trimis pe adresa de Email.') }}
                        </div>
                    @endif

                    {{ __('Înainte să continuați vă rugăm să vă verificați Email-ul pentru linkul de verificare.') }}
                    {{ __('Dacă nu ați primit un link de verificare') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click aici pentru a cere alt link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="app-content bg-blue-gradient">
<div class="app-content-leftauth">
    <img src="{{asset('images/logo.svg')}}" alt="Teambubble Logo">
</div>
<div class="app-content-rightauth">
    <img src="{{asset('images/logo.svg')}}" alt="Teambubble Logo" class="logo-mobile">
    <h1 class="form-title">{{__('auth.welcomeback')}}</h1>
    <a href="{{ route('login.google') }}" class="btn btn-google">
        <img class="icon" src="https://s2.svgbox.net/social.svg?color=white&ic=google" alt="Google"> Login with Google</a>
    <hr class="form-or">

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group form-email">
            <label for="email">{{ __('auth.email') }}</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('auth.email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group form-password">
            <label for="password">{{ __('auth.password') }}</label>
            <input id="password" type="password" class="@error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" placeholder="{{ __('auth.password') }}">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group form-remember">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('auth.rememberme') }}
                </label>
            </div>
        </div>
        <div class="form-group form-submit">
            <button type="submit" class="btn btn-primary">
                {{ __('auth.Login') }}
            </button>

            @if (Route::has('password.request'))
            <a class="btn-link" href="{{ route('password.request') }}">
                {{ __('auth.forgotpassword') }}
            </a>
            @endif

            @if (Route::has('register'))
            <a class="btn-link" href="{{ route('register') }}">
                {{ __('auth.noaccount') }}
            </a>
            @endif
        </div>
    </form>
    <div class="localization-buttons">
        <a href="{{url('/locale/nl')}}">NL</a> |
        <a href="{{url('/locale/en')}}">EN</a>
    </div>
</div>
</div>


@endsection

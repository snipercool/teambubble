@extends('layouts.app')

@section('content')
<div class="app-content">
    <div class="app-content-leftauth">
        <img src="{{asset('images/logo.svg')}}" alt="Teambubble Logo">
    </div>
    <div class="app-content-rightauth">
        <h1 class="form-title">{{__('auth.welcome')}}</h1>
        <p class="form-title-under">{{__('auth.createaccount')}}</p>
        <a href="{{ route('login.google') }}" class="btn btn-google">
            <img class="icon" src="https://s2.svgbox.net/social.svg?color=white&ic=google" alt="Google"> Login with
            Google</a>
        <hr class="form-or">

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group form-name">
                <label for="name">{{ __('auth.name') }}</label>
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus
                    placeholder="{{ __('auth.name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group form-email">
                <label for="email">{{ __('auth.email') }}</label>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="{{ __('auth.email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group form-password">
                <label for="password">{{ __('auth.password') }}</label>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                    value="{{ old('password') }}" required autocomplete="new-password" autofocus
                    placeholder="{{ __('auth.password') }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group form-password-confirm">
                <label for="password-confirm">{{ __('auth.password-confirm') }}</label>
                <input id="password-confirm" type="password" class="@error('password-confirm') is-invalid @enderror"
                    name="password_confirmation" value="{{ old('password-confirm') }}" required
                    autocomplete="new-password" autofocus placeholder="{{ __('auth.password-confirm') }}">
                @error('password-confirm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group form-submit">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                @if (Route::has('login'))
                <a class="btn-link" href="{{ route('login') }}">
                    {{ __('auth.account') }}
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

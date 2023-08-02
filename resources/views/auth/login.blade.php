@extends('layouts.app')

@section('login')

<!--<h2 style="color:white;justify-content: center;display: flex; font-size:3vh;">LOG IN</h2>-->
<div id="fondo">
    <div id="container" class="contenedor_base"></div>
    <div class="container contenedor">
        <div class="container space_bottom" style="justify-content: center;align-items: center;display: flex;">
            <img src="{{URL::asset('img/logo_blanco.png')}}" id="logo_blanco_login" title="logo_blanco">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <div class="card-header" style="border-bottom:0px !important; color:white;justify-content: center;display: flex; font-size:3vh;">{{ __('LOG IN') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                        <!--<form method="POST" action="/usuario">-->
                            @csrf

                            <div class="row mb-3">
                                <!--<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>-->

                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><ion-icon name="mail"></ion-icon></span>
                                        <input id="email" type="email" class="form-control inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo institucional" autofocus>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!--<label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>-->

                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><ion-icon name="lock-closed"></ion-icon></span>
                                        <input id="password" type="password" class="form-control inputLogin @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-12">
                                <div class="col-md-12 offset-md-12">
                                    <div class="container">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" style="color:white;" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="
                                align-items: center;
                                display: flex;
                                justify-content: center;
                            ">
                                <button type="submit" class="btn btn-primary buttonLogin">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-2 offset-md-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link textLogin" style="color:white;" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
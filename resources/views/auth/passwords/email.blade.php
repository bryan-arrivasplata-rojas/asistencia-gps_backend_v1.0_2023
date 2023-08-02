@extends('layouts.app')
@section('login')
<div id="fondo">
    <div id="container" class="contenedor_base"></div>
    <div class="container contenedor">
        <div class="container space_bottom" style="justify-content: center;align-items: center;display: flex;">
            <img src="{{URL::asset('img/logo_blanco.png')}}" id="logo_blanco_login" title="logo_blanco">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <div class="card-header" style="border-bottom:0px !important; color:white;justify-content: center;display: flex; font-size:3vh;">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><ion-icon name="mail"></ion-icon></span>
                                    <input id="email" type="email" class="form-control inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo institucional" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" style="
                                align-items: center;
                                display: flex;
                                justify-content: center;
                            ">
                                <button type="submit" class="btn btn-primary buttonLogin">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">    
                                    @if (Route::has('login'))
                                        <a class="btn btn-link textLogin" style="color:white;" href="{{ route('login') }}">
                                            {{ __('Volver al Inicio') }}
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

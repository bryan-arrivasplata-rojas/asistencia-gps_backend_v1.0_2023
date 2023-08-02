<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Asistencia GPS</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{asset('css/welcome.css')}}" rel="stylesheet">
        <link rel="shortcut icon" href="{{asset('img/asistencia.ico')}}" />
    </head>
    <body>
        <!--@if (Route::has('login'))
                <div class="container-fluid" id="enlaces">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif-->
        <!--<div id="fondo">
            @if (Route::has('login'))
                @auth    
                    <a href="{{ url('/home') }}" type="button" class="option btn btn-primary">Home - Asistencia GPS</a>
                @else
                    <a href="{{ route('login') }}" type="button" class="option btn btn-primary">Log In - Asistencia GPS</a>
                @endauth
            @endif
        </div>-->
        <div class="content">
            <div class="data">
                <div class="fondo">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="row">
                            <div class="col">
                                <div class="container row" *ngIf="isDone">
                                    <div class="col-sm-12 col-md-12 col-lg-12 language">
                                      <div class="card">
                                        <div class="card-header">
                                          <h5 class="card-title">Backend - Asistencia con Tecnología GPS</h5>
                                        </div>
                                        <div class="card-body">
                                          <iframe class="e2e-iframe-trusted-src" src="https://www.youtube.com/embed/anqphJkkPSM" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" loading="lazy" allowfullscreen></iframe>
                                        </div>
                                        <div class="card-footer">
                                            <p>Este proyecto de Backend esta desarrollado en Laravel, consume la información de un desarrollo en Nodejs, de esta manera podemos modificar los parámetros base del proyecto así como aulas, secciones, cursos, ciclo, etc.</p>
                                            @if (Route::has('login'))
                                                @auth    
                                                    <a href="{{ url('/home') }}" type="button" class="option btn btn-primary">Home - Asistencia GPS</a>
                                                @else
                                                    <a href="{{ route('login') }}" type="button" class="option btn btn-primary">Log In - Asistencia GPS</a>
                                                @endauth
                                            @endif
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="loader">
                        <div class="spinner-border text-danger" style="width: 70px;height: 70px;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="{{asset('js/welcome.js')}}" crossorigin="anonymous"></script>
    </body>
</html>

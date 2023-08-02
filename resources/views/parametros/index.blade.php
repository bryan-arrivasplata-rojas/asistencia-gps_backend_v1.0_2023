@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Parametros</h5>
            <a href="{{route('parametros.create')}}" class="btn btn-primary ms-auto">Agregar</a>
        </div>

    </div>
@endsection
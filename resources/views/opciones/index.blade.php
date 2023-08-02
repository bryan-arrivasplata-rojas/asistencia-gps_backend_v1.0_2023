@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Opciones</h5>
            <a href="{{route('opciones.create')}}" class="btn btn-primary ms-auto">Agregar</a>
        </div>

    </div>
@endsection
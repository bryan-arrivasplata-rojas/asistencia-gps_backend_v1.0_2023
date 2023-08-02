@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h5>Formulario de Asistencia: Ciclo Académico</h5>
            <a href="{{route('opciones.asistencias.index')}}" class="btn btn-primary ml-auto">Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('opciones.asistencias.store')}}" method ="POST" enctype="multipart/form-data" id="create">
                @include('opciones.asistencias.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Crear
            </button>
        </div>
    </div>
@endsection
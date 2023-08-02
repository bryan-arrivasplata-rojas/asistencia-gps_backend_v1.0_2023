@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h5>Formulario de Usuario x Sección : Ciclo Académico</h5>
            <a href="{{route('opciones.usuariosecciones.index')}}" class="btn btn-primary ml-auto">Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('opciones.usuariosecciones.store')}}" method ="POST" enctype="multipart/form-data" id="create">
                @include('opciones.usuariosecciones.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Crear
            </button>
        </div>
    </div>
@endsection
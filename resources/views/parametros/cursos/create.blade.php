@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h5>Formulario de Cursos</h5>
            <a href="{{route('parametros.cursos.index')}}" class="btn btn-primary ml-auto">Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('parametros.cursos.store')}}" method ="POST" enctype="multipart/form-data" id="create">
                @include('parametros.cursos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Crear
            </button>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h5>Formulario para Editar Secciones</h5>
            <a href="{{route('parametros.secciones.index')}}" class="btn btn-primary ml-auto">Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('parametros.secciones.update',$respuesta->cod_seccion)}}" method ="POST" enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('parametros.secciones.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Editar
            </button>
        </div>
    </div>
@endsection
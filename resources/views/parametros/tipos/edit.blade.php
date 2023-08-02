@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h5>Formulario para Editar Rol de Usuario</h5>
            <a href="{{route('parametros.tipos.index')}}" class="btn btn-primary ml-auto">Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('parametros.tipos.update',$respuesta->tipo)}}" method ="POST" enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('parametros.tipos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Editar
            </button>
        </div>
    </div>
@endsection
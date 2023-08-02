@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h5>Formulario para Editar Tipo de ciclos</h5>
            <a href="{{route('parametros.tipociclo.index')}}" class="btn btn-primary ml-auto">Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('parametros.tipociclo.update',$respuesta->cod_tipo_ciclo)}}" method ="POST" enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('parametros.tipociclo.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Editar
            </button>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline">
            <h5>Formulario para Editar Orden de Pedido : Ciclo Académico</h5>
            <a href="{{route('opciones.ops.index')}}" class="btn btn-primary ml-auto">Volver</a>
        </div>
        <div class="card-body">
            <form action ="{{route('opciones.ops.update',$respuesta->cod_op)}}" method ="POST" enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('opciones.ops.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                Editar
            </button>
        </div>
    </div>
@endsection
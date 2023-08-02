@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Roles de Usuario</h5>
            <a href="{{route('parametros.tipos.index')}}" class="btn btn-primary ms-auto" hidden>Agregar</a>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-tipo" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->tipo}}">
                            <td>{{$resp->descripcion}}</td>
                            <td>
                                <a href="{{route('parametros.tipos.edit',$resp->tipo)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->tipo}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.tipos.destroy',$resp->tipo)}}" method ="POST" id="delete_{{$resp->tipo}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection
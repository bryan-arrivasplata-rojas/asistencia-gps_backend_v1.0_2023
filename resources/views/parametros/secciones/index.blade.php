@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Secciones</h5>
            <a href="{{route('parametros.secciones.create')}}" class="btn btn-primary ms-auto">Agregar</a>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-secciones" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Sección</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_seccion}}">
                            <td>{{$resp->cod_seccion}}</td>
                            <td>{{$resp->descripcion}}</td>
                            <td>
                                <a href="{{route('parametros.secciones.edit',$resp->cod_seccion)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_seccion}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.secciones.destroy',$resp->cod_seccion)}}" method ="POST" id="delete_{{$resp->cod_seccion}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
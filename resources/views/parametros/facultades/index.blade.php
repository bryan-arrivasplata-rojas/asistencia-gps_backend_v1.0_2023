@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Facultades</h5>
            <a href="{{route('parametros.facultades.create')}}" class="btn btn-primary ms-auto">Agregar</a>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-facultades" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Abreviatura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_facultad}}">
                            <td>{{$resp->descripcion}}</td>
                            <td>{{$resp->abreviatura}}</td>
                            <td>
                                <a href="{{route('parametros.facultades.edit',$resp->cod_facultad)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_facultad}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.facultades.destroy',$resp->cod_facultad)}}" method ="POST" id="delete_{{$resp->cod_facultad}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
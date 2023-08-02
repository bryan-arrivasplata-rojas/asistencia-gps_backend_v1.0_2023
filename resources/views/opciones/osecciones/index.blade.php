@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <input id="url" type="text" value="{{$url}}" disabled hidden>
        <div class="card-header d-inline-flex">
            <h5>Secciones x Curso : Ciclo Académico</h5>
            <a href="{{route('opciones.osecciones.create')}}" class="btn btn-primary ms-auto">Agregar</a>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-ciclo" name="cod_ciclo" title="cod_ciclo">
                <option value="" selected>Seleccionar una ciclo académico</option>
                @foreach ($ciclo as $resp)
                    <option value="{{$resp->descripcion}}">{{$resp->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select" id="combobox_cod_facultad" name="cod_facultad" title="cod_facultad">
                <option value="" selected>Seleccionar una facultad</option>
                @foreach ($facultad as $resp)
                    <option value="{{$resp->descripcion}}" data-facultad="{{$resp->cod_facultad}}">{{$resp->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-curso" name="cod_curso" title="cod_curso">
                <option value="" selected>Seleccionar un curso</option>
            </select>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-osecciones" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Ciclo Académico</th>
                        <th>Descripción Facultad</th>
                        <th>Curso</th>
                        <th hidden>Codigo de Ocurso</th>
                        <th>Seccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_oseccion}}">
                            <td>{{$resp->descripcion_op}}</td>
                            <td>{{$resp->descripcion_facultad}}</td>
                            <td>{{$resp->cod_curso}}: {{$resp->descripcion_curso}}</td>
                            <td hidden>{{$resp->cod_ocurso}}</td>
                            <td>{{$resp->cod_seccion}}</td>
                            <td>
                                <a href="{{route('opciones.osecciones.edit',$resp->cod_oseccion)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_oseccion}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('opciones.osecciones.destroy',$resp->cod_oseccion)}}" method ="POST" id="delete_{{$resp->cod_oseccion}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
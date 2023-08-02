@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Cursos : Ciclo Académico</h5>
            <a href="{{route('opciones.ocursos.create')}}" class="btn btn-primary ms-auto">Agregar</a>
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
            <select class="form-select filter-select" name="cod_facultad" title="cod_facultad">
                <option value="" selected>Seleccionar una facultad</option>
                @foreach ($facultad as $resp)
                    <option value="{{$resp->descripcion}}">{{$resp->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-ocursos" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Ciclo Académico</th>
                        <th>Descripción Facultad</th>
                        <th>Codigo de Curso</th>
                        <th>Descripcion del Curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_ocurso}}">
                            <td>{{$resp->descripcion_op}}</td>
                            <td>{{$resp->descripcion_facultad}}</td>
                            <td>{{$resp->cod_curso}}</td>
                            <td>{{$resp->descripcion_curso}}</td>
                            <td>
                                <a href="{{route('opciones.ocursos.edit',$resp->cod_ocurso)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_ocurso}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('opciones.ocursos.destroy',$resp->cod_ocurso)}}" method ="POST" id="delete_{{$resp->cod_ocurso}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
@extends('layouts.app')
@section('content')
    <input id="url" type="text" value="{{$url}}" placeholder="http" tittle="url" disabled hidden>
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Asistencia : Ciclo Académico</h5>
            
            @if(!isset($prueba))
                <a class="btn btn-primary ms-auto"  onclick="return confirm('No esta permitido crear una asistencia, ello lo debe realizar el mismo estudiante')">Agregar</a>
            @else
                <a href="{{route('opciones.asistencias.create')}}" class="btn btn-primary ms-auto">Agregar</a>
            @endif
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-ciclo" id="combobox_cod_op_op_semana" name="cod_op" title="cod_op">
                <option value="">Seleccionar una ciclo académico</option>
                @foreach ($ciclo as $resp)
                    <option value="{{$resp->descripcion}}" data-op="{{$resp->cod_op}}">{{$resp->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select" id="combobox_cod_facultad" name="cod_facultad" title="cod_facultad">
                <option value="">Seleccionar una facultad</option>
                @foreach ($facultad as $resp)
                    <option value="{{$resp->descripcion}}" data-facultad="{{$resp->cod_facultad}}">{{$resp->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-curso" id="combobox_cod_curso_seccion" name="cod_curso" title="cod_curso">
                <option value="">Seleccionar un curso</option>
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-seccion" name="cod_seccion" title="cod_seccion">
                <option value="">Seleccionar una sección</option>
                @foreach ($seccion as $resp)
                    <option value="{{$resp->cod_seccion}}">Sección {{$resp->cod_seccion}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-semana" id="combobox_cod_op_semana_solicitud" name="cod_op_semana" title="cod_op_semana">
                <option value="">Seleccionar una semana</option>
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-solicitud" name="num_solicitud" title="num_solicitud">
                <option value="">Seleccionar una solicitud</option>
            </select>
        </div>
        <div class="container-fluid" style="margin-top:5px;">
            <select class="form-select filter-select-email" name="email" title="email">
                <option value="">Seleccionar email del alumno</option>
                @foreach ($email as $resp)
                    <option value="{{$resp->email}}">{{$resp->email}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-asistencias" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th hidden>Ciclo Académico</th>
                        <th hidden>Descripción Facultad</th>
                        <th>Descripción Curso</th>
                        <th>Descripcion Sección</th>
                        <th>Semana</th>
                        <th>N° de Solicitud</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->id}}">
                            <td hidden>{{$resp->descripcion_op}}</td>
                            <td hidden>{{$resp->descripcion_facultad}}</td>
                            <td>{{$resp->cod_curso}}: {{$resp->descripcion_curso}}</td>
                            <td>{{$resp->cod_seccion}}</td>
                            <td>{{$resp->num_semana}}</td>
                            <td>{{$resp->num_solicitud}}</td>
                            <td>{{$resp->email}}</td>
                            <td>
                                @if(!isset($prueba))
                                    <a class="btn btn-success" onclick="return confirm('No esta permitido editar información de asistencia')">Editar</a>
                                @else
                                    <a href="{{route('opciones.asistencias.edit',$resp->id)}}" class="btn btn-success">Editar</a>
                                @endif
                                <!---->
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->id}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('opciones.asistencias.destroy',$resp->id)}}" method ="POST" id="delete_{{$resp->id}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
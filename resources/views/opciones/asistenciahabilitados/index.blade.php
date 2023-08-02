@extends('layouts.app')
@section('content')
    <input id="url" type="text" value="{{$url}}" placeholder="http" tittle="url" disabled hidden>
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Asistencia Habilitado : Ciclo Académico</h5>
            <a href="{{route('opciones.asistenciahabilitados.create')}}" class="btn btn-primary ms-auto">Agregar</a>
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
                <option value="">Seleccionar email del docente</option>
                @foreach ($email as $resp)
                    <option value="{{$resp->email}}">{{$resp->email}}</option>
                @endforeach
            </select>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-asistenciahabilitados" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th hidden>Ciclo Académico</th>
                        <th hidden>Descripción Facultad</th>
                        <th>Descripción Curso</th>
                        <th>Descripcion Sección</th>
                        <th>Semana</th>
                        <th>N° de Solicitud</th>
                        <th hidden>Email</th>
                        <th hidden>Descripcion Usuario</th>
                        <th>Distancia Máxima</th>
                        <th>Tiempo de Cierre de la Solicitud</th>
                        <th hidden>Aula</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_asistencia_habilitado}}">
                            <td hidden>{{$resp->descripcion_op}}</td>
                            <td hidden>{{$resp->descripcion_facultad}}</td>
                            <td>{{$resp->cod_curso}}: {{$resp->descripcion_curso}}</td>
                            <td>{{$resp->cod_seccion}}</td>
                            <td>{{$resp->num_semana}}</td>
                            <td>{{$resp->num_solicitud}}</td>
                            <td hidden>{{$resp->email}}</td>
                            <td hidden>{{$resp->descripcion_usuario}}</td>
                            @if ($resp->distancia_maxima!=0)
                                <td>{{$resp->distancia_maxima}} mtrs</td>
                            @else
                                <td>Ilimitado</td>
                            @endif
                            @if ($resp->tiempo_cerrar_num_solicitud!=0)
                                <td>{{$resp->tiempo_cerrar_num_solicitud}} min</td>
                            @else
                                <td>Ilimitado</td>
                            @endif
                            <td hidden>{{$resp->cod_aula}}: {{$resp->referencia}}</td>
                            <td>{{$resp->habilitado}}</td>
                            <td>
                                <a href="{{route('opciones.asistenciahabilitados.edit',$resp->cod_asistencia_habilitado)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_asistencia_habilitado}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('opciones.asistenciahabilitados.destroy',$resp->cod_asistencia_habilitado)}}" method ="POST" id="delete_{{$resp->cod_asistencia_habilitado}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Semanas del Ciclo Académico</h5>
            <a href="{{route('opciones.osemanas.create')}}" class="btn btn-primary ms-auto">Agregar</a>
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
            <table id="table-osemanas" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Ciclo Académico</th>
                        <th>Descripción Facultad</th>
                        <th>N° de Semana</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_op_semana}}">
                            <td>{{$resp->descripcion_op}}</td>
                            <td>{{$resp->descripcion_facultad}}</td>
                            <td>{{$resp->num_semana}}</td>
                            <td>{{$resp->fecha_inicio}}</td>
                            <td>{{$resp->fecha_final}}</td>
                            <td>
                                <a href="{{route('opciones.osemanas.edit',$resp->cod_op_semana)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_op_semana}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('opciones.osemanas.destroy',$resp->cod_op_semana)}}" method ="POST" id="delete_{{$resp->cod_op_semana}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
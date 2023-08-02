@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Aulas</h5>
            <a href="{{route('parametros.aulas.create')}}" class="btn btn-primary ms-auto">Agregar</a>
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
            <table id="table-aulas" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th hidden>OP</th>
                        <th hidden>Facultad</th>
                        <th>Código de Aula</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Referencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_aula}}">
                            <td hidden></td>
                            <td hidden>{{$resp->descripcion}}</td>
                            <td>{{$resp->cod_aula}}</td>
                            <td>{{$resp->latitud}}</td>
                            <td>{{$resp->longitud}}</td>
                            <td>{{$resp->referencia}}</td>
                            <td>
                                <a href="{{route('parametros.aulas.edit',$resp->cod_aula)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_aula}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.aulas.destroy',$resp->cod_aula)}}" method ="POST" id="delete_{{$resp->cod_aula}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
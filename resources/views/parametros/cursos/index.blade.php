@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Cursos</h5>
            <a href="{{route('parametros.cursos.create')}}" class="btn btn-primary ms-auto">Agregar</a>
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
            <table id="table-cursos" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th hidden>OP</th>
                        <th hidden>Facultad</th>
                        <th>Codigo de Curso</th>
                        <th>Descripción del curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_curso}}">
                            <td hidden></td>
                            <td hidden>{{$resp->facultad}}</td>
                            <td>{{$resp->cod_curso}}</td>
                            <td>{{$resp->descripcion}}</td>
                            <td>
                                <a href="{{route('parametros.cursos.edit',$resp->cod_curso)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_curso}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.cursos.destroy',$resp->cod_curso)}}" method ="POST" id="delete_{{$resp->cod_curso}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
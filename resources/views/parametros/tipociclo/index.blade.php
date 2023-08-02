@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Tipo de ciclos</h5>
            <a href="{{route('parametros.tipociclo.create')}}" class="btn btn-primary ms-auto"><i style='text-align: center;'>+</i> Agregar</a>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-ciclos" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <!--<th>cod_tipo_ciclo</th>-->
                        <th>N° semanas de ciclo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->cod_tipo_ciclo}}">
                            <td>{{$resp->semanas}} semanas</td>
                            <td>
                                <a href="{{route('parametros.tipociclo.edit',$resp->cod_tipo_ciclo)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->cod_tipo_ciclo}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.tipociclo.destroy',$resp->cod_tipo_ciclo)}}" method ="POST" id="delete_{{$resp->cod_tipo_ciclo}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
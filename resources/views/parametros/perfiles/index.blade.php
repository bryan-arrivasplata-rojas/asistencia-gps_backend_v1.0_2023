@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Perfiles</h5>
            <a href="{{route('parametros.perfiles.create')}}" class="btn btn-primary ms-auto">Agregar</a>
        </div>
        
        <div class="container-fluid container-tabla">
            <table id="table-perfiles" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Tercer Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Rol</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->codigo}}">
                            <td>{{$resp->codigo}}</td>
                            <td>{{$resp->primer_nombre}}</td>
                            <td>{{$resp->segundo_nombre}}</td>
                            <td>{{$resp->tercer_nombre}}</td>
                            <td>{{$resp->apellido_paterno}}</td>
                            <td>{{$resp->apellido_materno}}</td>
                            <td>{{$resp->descripcion}}</td>
                            <td>{{$resp->email}}</td>
                            <td>
                                <a href="{{route('parametros.perfiles.edit',$resp->codigo)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->codigo}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.perfiles.destroy',$resp->codigo)}}" method ="POST" id="delete_{{$resp->codigo}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
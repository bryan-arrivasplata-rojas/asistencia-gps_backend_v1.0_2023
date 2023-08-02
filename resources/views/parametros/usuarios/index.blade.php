@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Usuarios</h5>
            <a href="{{route('parametros.usuarios.create')}}" class="btn btn-primary ms-auto">Agregar</a>
        </div>
        <div class="container-fluid container-tabla">
            <table id="table-usuarios" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuesta as $resp)
                        <tr id="{{$resp->email}}">
                            <td>{{$resp->email}}</td>
                            <td>{{$resp->password}}</td>
                            <td>
                                <a href="{{route('parametros.usuarios.edit',$resp->email)}}" class="btn btn-success">Editar</a>
                                <button class='btnBorrar btn btn-danger' type='submit' form="delete_{{$resp->email}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Borrar</button>
                                <form action="{{route('parametros.usuarios.destroy',$resp->email)}}" method ="POST" id="delete_{{$resp->email}}" enctype="multipart/form-data" hidden><!--method ="POST" -->
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
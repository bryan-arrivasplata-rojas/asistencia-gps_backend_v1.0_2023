@csrf
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Código</label>
            <input type="text" class="form-control" name="codigo" value="{{(isset($respuesta))?$respuesta->codigo: old('codigo')}}" placeholder="Escribir el código del perfil" maxlength="10" required>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Primer Nombre</label>
        <input type="text" class="form-control" name="primer_nombre" value="{{(isset($respuesta))?$respuesta->primer_nombre: old('primer_nombre')}}" placeholder="Escribir el primer nombre" maxlength="50" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Segundo Nombre</label>
        <input type="text" class="form-control" name="segundo_nombre" value="{{(isset($respuesta))?$respuesta->segundo_nombre: old('segundo_nombre')}}" placeholder="Escribir el segundo nombre" maxlength="50">
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Tercer Nombre</label>
        <input type="text" class="form-control" name="tercer_nombre" value="{{(isset($respuesta))?$respuesta->tercer_nombre: old('tercer_nombre')}}" placeholder="Escribir el tercer nombre" maxlength="50">
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Apellido Paterno</label>
        <input type="text" class="form-control" name="apellido_paterno" value="{{(isset($respuesta))?$respuesta->apellido_paterno: old('apellido_paterno')}}" placeholder="Escribir el apellido paterno" maxlength="50" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Apellido Materno</label>
        <input type="text" class="form-control" name="apellido_materno" value="{{(isset($respuesta))?$respuesta->apellido_materno: old('apellido_materno')}}" placeholder="Escribir el apellido materno" maxlength="50" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Rol de usuario</label>
        <select class="form-select" name="tipo" title="tipo" required>
            @foreach ($tipo as $resp)
                @if(isset($respuesta))
                    @if($resp->tipo == $respuesta->tipo)
                        <option value="{{$resp->tipo}}" selected>{{$resp->descripcion}}</option>
                    @else{
                        <option value="{{$resp->tipo}}">{{$resp->descripcion}}</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->tipo}}">{{$resp->descripcion}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Email</label>
        <select class="form-select" name="email" title="email" required>
            @if(isset($email))
                @foreach ($email as $resp)
                    @if(isset($respuesta))
                        @if($resp->email == $respuesta->email)
                            <option value="{{$resp->email}}" selected>{{$resp->email}}</option>
                        @else
                            @foreach ($email_ as $re)
                                @if($resp->email == $re->email)
                                    <option value="{{$resp->email}}">{{$resp->email}}</option>
                                @endif
                            @endforeach
                            
                        @endif
                    @else
                        <option value="{{$resp->email}}">{{$resp->email}}</option>
                    @endif
                @endforeach
            @else
                <option value="" selected>No hay email disponible, agregar un usuario nuevo para asignarse su perfil</option>
            @endif
        </select>
    </div>
</div>
</div>
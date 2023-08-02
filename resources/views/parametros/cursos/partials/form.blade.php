@csrf
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Código del curso</label>
            <input type="text" class="form-control" name="cod_curso" value="{{(isset($respuesta))?$respuesta->cod_curso: old('cod_curso')}}" placeholder="Escribir el código del curso" maxlength="10" required>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Descripción del curso</label>
        <input type="text" class="form-control" name="descripcion" value="{{(isset($respuesta))?$respuesta->descripcion: old('descripcion')}}" placeholder="Escribir la descripcion del curso" maxlength="50" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Facultad</label>
        <select class="form-select filter-select" name="cod_facultad" title="cod_facultad" required>
            <option value="">Seleccionar una facultad</option>
            @foreach ($facultad as $resp)
                @if(isset($respuesta))
                    @if($resp->descripcion == $respuesta->facultad)
                        <option value="{{$resp->cod_facultad}}" selected>{{$resp->descripcion}}</option>
                    @else{
                        <option value="{{$resp->cod_facultad}}">{{$resp->descripcion}}</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->cod_facultad}}">{{$resp->descripcion}}</option>
                @endif
                
            @endforeach
        </select>
    </div>
</div>
</div>
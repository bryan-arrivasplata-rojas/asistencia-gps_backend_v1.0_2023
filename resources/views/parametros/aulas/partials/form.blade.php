@csrf
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Código de aula</label>
            <input type="text" class="form-control" name="cod_aula" value="{{(isset($respuesta))?$respuesta->cod_aula: old('cod_aula')}}" placeholder="Escribir la descripción del aula" maxlength="50" required>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Latitud</label>
        <input type="number" class="form-control" step=any name="latitud" value="{{(isset($respuesta))?$respuesta->latitud: old('latitud')}}" placeholder="Escribir la latitud del aula" maxlength="14" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Longitud</label>
        <input type="number" class="form-control" step=any name="longitud" value="{{(isset($respuesta))?$respuesta->longitud: old('longitud')}}" placeholder="Escribir la longitud del aula" maxlength="14" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Referencia</label>
        <input type="text" class="form-control" name="referencia" value="{{(isset($respuesta))?$respuesta->referencia: old('referencia')}}" placeholder="Escribir la referencia del aula" maxlength="200" required>
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
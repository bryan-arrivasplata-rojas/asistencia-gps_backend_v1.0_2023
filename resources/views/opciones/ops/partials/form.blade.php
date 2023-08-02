@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Ciclo Académico</label>
        <input type="text" class="form-control" name="descripcion" value="{{(isset($respuesta))?$respuesta->descripcion: old('descripcion')}}" placeholder="Escribir la descripción del ciclo Académico" maxlength="50" required>
    </div>
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Facultad</label>
            <select class="form-select filter-select" name="cod_facultad" title="cod_facultad" required>
                <option value="">Seleccionar una facultad</option>
                @foreach ($facultad as $resp)
                    @if(isset($respuesta))
                        @if($resp->descripcion == $respuesta->descripcion_facultad)
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
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Semanas del ciclo</label>
        <select class="form-select" name="cod_tipo_ciclo" title="cod_tipo_ciclo" required>
            <option value="">Seleccionar la semana</option>
            @foreach ($semana as $resp)
                @if(isset($respuesta))
                    @if($resp->semanas == $respuesta->semanas)
                        <option value="{{$resp->cod_tipo_ciclo}}" selected>{{$resp->semanas}} semanas</option>
                    @else{
                        <option value="{{$resp->cod_tipo_ciclo}}">{{$resp->semanas}} semanas</option>
                    }
                    @endif
                @else
                    <option value="{{$resp->cod_tipo_ciclo}}">{{$resp->semanas}} semanas</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Fecha Inicio</label>
        <input type="text" class="form-control datepicker" id="fecha_inicial" name="fecha_inicio" value="{{(isset($respuesta))?$respuesta->fecha_inicio: old('fecha_inicio')}}" placeholder="Escribir la fecha inicial del ciclo Académico" required onkeypress="return false;">
    </div>
    <div class="col-12"><div class="form-group"><!--2022-12-09 00:15:15-->
        <label form="">Fecha Final</label>
        <input type="text" class="form-control datepicker" id="fecha_final" name="fecha_final" value="{{(isset($respuesta))?$respuesta->fecha_final: old('fecha_final')}}" placeholder="Escribir la fecha final del ciclo Académico" required onkeypress="return false;">
    </div>
</div>
</div>
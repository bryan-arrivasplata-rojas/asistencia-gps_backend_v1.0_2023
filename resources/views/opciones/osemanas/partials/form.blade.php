@csrf
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Ciclo Académico</label>
            <select class="form-select filter-select" name="cod_op" title="cod_op" required>
                <option value="">Seleccionar un ciclo académico</option>
                @foreach ($ciclo as $resp)
                    @if(isset($respuesta))
                        @if($resp->descripcion == $respuesta->descripcion_op)
                            <option value="{{$resp->cod_op}}" selected>{{$resp->descripcion}}: {{$resp->descripcion_facultad}}</option>
                        @else{
                            <option value="{{$resp->cod_op}}">{{$resp->descripcion}}: {{$resp->descripcion_facultad}}</option>
                        }
                        @endif
                    @else
                        <option value="{{$resp->cod_op}}">{{$resp->descripcion}}: {{$resp->descripcion_facultad}}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>
    @endif
    <div class="col-12"><div class="form-group" hidden>
        <label form="">N° de Semana</label>
        <input type="number" class="form-control" name="num_semana" value="{{(isset($respuesta))?$respuesta->num_semana: old('num_semana')}}" placeholder="Escribir el número de semana del ciclo Académico" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
    </div>
    @if(isset($respuesta))
        <div class="col-12"><div class="form-group" hidden>
            <label form="">Codigo de Op</label>
            <input type="number" class="form-control" name="cod_op" value="{{(isset($respuesta))?$respuesta->cod_op: old('cod_op')}}" placeholder="Escribir el codigo de OP" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
    @endif
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
@csrf
@if(!isset($respuesta))
    <input id="url" type="text" value="{{$url}}" disabled hidden>
@endif
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Ciclo Académico</label>
            <select class="form-select filter-select" id="combobox_cod_op" name="cod_op" title="cod_op" required>
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
    <div class="col-12"><div class="form-group">
        <label form="">Cursos del Ciclo Académico</label>
        <select class="form-select filter-select" name="cod_curso" title="cod_curso" required>
            <option value="">Seleccionar el curso del ciclo académico</option>
            @if(isset($respuesta))
                <option value="{{$respuesta->cod_curso}}" selected>{{$respuesta->cod_curso}}: {{$respuesta->descripcion_curso}}</option>
                @foreach ($curso as $resp)
                    <option value="{{$resp->cod_curso}}">{{$resp->cod_curso}}: {{$resp->descripcion}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
</div>
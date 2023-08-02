@csrf
@if(!isset($respuesta))
    <input id="url" type="text" value="{{$url}}" disabled hidden>
@endif
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Ciclo Académico</label>
            <select class="form-select filter-select-ciclo" id="combobox_cod_op_ocurso" name="cod_op" title="cod_op" required>
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
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Cursos</label>
            <select class="form-select filter-select-curso" id="combobox_cod_ocurso" name="cod_ocurso" title="cod_ocurso" required>
                <option value="">Seleccionar el curso</option>
            </select>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Secciones</label>
        <select class="form-select filter-select-curso" name="cod_seccion" title="cod_seccion" required>
            <option value="">Seleccionar la sección</option>
            @if(isset($respuesta))
                <option value="{{$respuesta->cod_seccion}}" selected>{{$respuesta->cod_seccion}}</option>
                @foreach ($seccion as $resp)
                    @if($respuesta->cod_seccion!=$resp->cod_seccion)
                        <option value="{{$resp->cod_seccion}}">{{$resp->cod_seccion}}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>
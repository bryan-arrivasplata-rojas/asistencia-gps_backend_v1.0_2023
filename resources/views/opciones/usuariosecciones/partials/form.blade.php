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
                    <option value="{{$resp->cod_op}}">{{$resp->descripcion}}: {{$resp->descripcion_facultad}}</option>
                @endforeach
            </select>
        </div>
    @endif
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Cursos</label>
            <select class="form-select filter-select-curso" id="combobox_cod_ocurso_oseccion" name="cod_ocurso" title="cod_ocurso" required>
                <option value="">Seleccionar el curso</option>
            </select>
        </div>
    @endif
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Secciones</label>
            <select class="form-select filter-select-seccion" id="combobox_cod_oseccion_email" name="cod_oseccion" title="cod_oseccion" required>
                <option value="">Seleccionar la sección</option>
            </select>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Email</label>
        <select class="form-select filter-select-email" name="email" title="email" required>
            <option value="">Seleccionar el usuario</option>
            @if(isset($respuesta))
                <option value="{{$respuesta->email}}" selected>{{$respuesta->email}}</option>
                @foreach ($email as $resp)
                    @if($respuesta->email!=$resp->email)
                        <option value="{{$resp->email}}">{{$resp->email}}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>
</div>
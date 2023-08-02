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
            <select class="form-select filter-select-curso" id="combobox_cod_ocurso_oseccion_aula" name="cod_ocurso" title="cod_ocurso" required>
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
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Semanas</label>
            <select class="form-select filter-select-semana" name="cod_op_semana" title="cod_op_semana" required>
                <option value="">Seleccionar la semana</option>
                @foreach ($semana as $resp)
                    <option value="{{$resp->cod_op_semana}}">{{$resp->num_semana}}</option>
                @endforeach
            </select>
        </div>
    @endif
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Aula</label>
            <select class="form-select filter-select-aula" name="cod_aula" title="cod_aula" required>
                <option value="">Seleccionar el aula</option>
            </select>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Distancia Máxima en metros (Colocar 0 si se requiere sea infinito)</label>
        <input type="number" class="form-control" step=any name="distancia_maxima" value="{{(isset($respuesta))?$respuesta->distancia_maxima: old('distancia_maxima')}}" placeholder="Escribir la distancia máxima para marcar asistencia" maxlength="14" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Tiempo para cerrrar la asistencia en minutos (Colocar 0 si se requiere sea infinito)</label>
        <input type="number" class="form-control" name="tiempo_cerrar_num_solicitud" value="{{(isset($respuesta))?$respuesta->tiempo_cerrar_num_solicitud: old('tiempo_cerrar_num_solicitud')}}" placeholder="Escribir el tiempo para cerrar la asistencia" maxlength="14" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
    </div>
    @if(isset($respuesta))
        @if($respuesta->habilitado ==='Habilitado')
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="habilitado" id="habilitado" value="0" checked>
                <label class="form-check-label" for="habilitado">Habilitado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="habilitado" id="deshabilitado" value="1">
                <label class="form-check-label" for="deshabilitado">Deshabilitado</label>
            </div>
        @else
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="habilitado" value="0">
                <label class="form-check-label" for="habilitado">Habilitado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="deshabilitado" value="1" checked>
                <label class="form-check-label" for="deshabilitado">Deshabilitado</label>
            </div>
        @endif
    @endif
</div>
</div>
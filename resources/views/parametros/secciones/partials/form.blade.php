@csrf
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Seccion</label>
            <input type="text" class="form-control" name="cod_seccion" value="{{(isset($respuesta))?$respuesta->cod_seccion: old('cod_seccion')}}" placeholder="Escribir la sección" maxlength="10" required>
        </div>
    @endif    
    <div class="col-12"><div class="form-group">
        <label form="">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{{(isset($respuesta))?$respuesta->descripcion: old('descripcion')}}" placeholder="Escribir la descripción de la sección"  maxlength="50" required>
    </div>
</div>
@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{{(isset($respuesta))?$respuesta->descripcion: old('descripcion')}}" placeholder="Escribir la descripción de la facultad" maxlength="100" required>
    </div>
    <div class="col-12"><div class="form-group">
        <label form="">Abreviatura</label>
        <input type="text" class="form-control" name="abreviatura" value="{{(isset($respuesta))?$respuesta->abreviatura: old('abreviatura')}}" placeholder="Escribir la abreviatura de la facultad" maxlength="50" required>
    </div>
</div>
</div>
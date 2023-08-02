@csrf
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Codigo de Rol</label>
            <input type="text" class="form-control" name="tipo" value="{{(isset($respuesta))?$respuesta->tipo: old('tipo')}}" placeholder="Escribir de tipo de código de rol" maxlength="100" required>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Descripción</label>
        <input type="text" class="form-control" name="descripcion" value="{{(isset($respuesta))?$respuesta->descripcion: old('descripcion')}}" placeholder="Escribir la descripción del rol" maxlength="50" required>
    </div>
</div>
</div>
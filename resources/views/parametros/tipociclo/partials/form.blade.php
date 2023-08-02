@csrf
<div class="row">
    <div class="col-12"><div class="form-group">
        <label form="">Semanas</label>
        <input type="number" class="form-control" name="semanas" value="{{(isset($respuesta))?$respuesta->semanas: old('semanas')}}" placeholder="Escribir el numero de semanas" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
    </div>
</div>
</div>
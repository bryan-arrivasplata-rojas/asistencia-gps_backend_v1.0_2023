@csrf
<div class="row">
    @if(!isset($respuesta))
        <div class="col-12"><div class="form-group">
            <label form="">Email</label>
            <input type="text" class="form-control" name="email" value="{{(isset($respuesta))?$respuesta->email: old('email')}}" placeholder="Escribir el email del usuario" maxlength="50" required>
        </div>
    @endif
    <div class="col-12"><div class="form-group">
        <label form="">Password</label>
        <input type="text" class="form-control" name="password" value="{{(isset($respuesta))?$respuesta->password: old('password')}}" placeholder="Escribir la contraseña del usuario" maxlength="50" required>
    </div>
</div>
</div>
<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

<div class="form-group">
    {!! Form::label('Nombres') !!}
    {!! Form::text('name',null,['placeholder'=>'Ingrese los Nombres','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>

<div class="form-group">
    {!! Form::label('Apellidos') !!}
    {!! Form::text('last_name',null,['placeholder'=>'Ingrese los Apellidos','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>

<div class="form-group">
    {!! Form::label('Correo') !!}
    {!! Form::email('email',old('email'),['placeholder'=>'Ingrese el correo','class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path',['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('Contraseña') !!}
    {!! Form::password('password',old('password'),['class' => 'form-control', 'placeholder' => 'Password']) !!}
</div>

<div class="form-group">
    <label>Rol</label>
    <select class="form-control select2" name="roles" id="roles" style="width: 100%;" >
        <option value="" disabled selected>Seleccione el rol</option>
       
            <option value="1" >  Administrador </option>
            <option value="2" >  Registrado </option>
       
    </select>
</div>
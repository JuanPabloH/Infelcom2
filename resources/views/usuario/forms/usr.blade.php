
<div class="form-group">
		{!!Form::label('document','Documento:')!!}
		{!!Form::number('document',null,['class'=>'form-control','placeholder'=>'Ingresa el documento del usuario'])!!}
	</div>
<div class="form-group">
		{!!Form::label('name','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('last_name','Apellido:')!!}
		{!!Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Ingresa el apellido del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cv','CV Lac:')!!}
		{!!Form::text('cv',null,['class'=>'form-control','placeholder'=>'Ingresa el cv del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('photo','Foto:')!!}
		{!!Form::file('photo')!!}
	</div>
	<div class="form-group">
		{!!Form::label('email','Correo:')!!}
		{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa el email del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('password','Contraseña:')!!}
		{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa la contraseña del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('role','Elija el rol del usuario:')!!}
		<select id="role" class="form-control" name="role">
  			<option value="1">Docente</option>
  			<option value="2">Estudiante</option>
		</select>
		</div>

	                        
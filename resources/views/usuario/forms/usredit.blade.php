<div class="form-group">
		{!!Form::label('document','Documento de identidad')!!}
		{!!Form::text('document',null,['class'=>'form-control','placeholder'=>'Ingresa el documento del usuario'])!!}
	</div>
<div class="form-group">
		{!!Form::label('name','Nombres')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('last_name','Apellidos')!!}
		{!!Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Ingresa el apellido del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('cv','Hoja de vida del investigador:')!!}
		{!!Form::text('cv',null,['class'=>'form-control','placeholder'=>'Ingresa el cv del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('photo','Foto')!!}
		{!!Form::file('photo')!!}
	</div>
	<div class="form-group">
		{!!Form::label('email','Correo electronico')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el email del usuario','required autofocus'])!!}
	</div>

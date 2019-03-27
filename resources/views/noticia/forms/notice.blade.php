<div class="form-group">
		
		

		{!!Form::label('name','Noticia:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre de la notica'])!!}

		{!!Form::label('description','Descripción:')!!}
		{!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Ingresa la descripción de la noticia'])!!}

		{!!Form::label('photo','Foto:')!!}
		{!!Form::file('photo')!!}

		
	</div>
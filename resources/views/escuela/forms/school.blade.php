<div class="form-group">
		{!!Form::label('code','Codigo:')!!}
		{!!Form::text('code',null,['class'=>'form-control','placeholder'=>'Ingresa el código de la escuela'])!!}
		{!!Form::label('name','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre de la escuela'])!!}
		{!!Form::label('facultad','Elija la facultad a la cual pertenece la escuela:')!!}
		<select id="id_faculty" class="form-control" name="id_faculty">
			@foreach($faculties as $faculty)
  			<option value="{{$faculty->id}}">{{$faculty->name}}</option>
		  	@endforeach
		</select>
	</div>
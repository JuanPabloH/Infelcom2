<div class="form-group">
		
		{!!Form::label('file','File:')!!}
		{!!Form::file('file')!!}

		{!!Form::label('description','Descripción:')!!}
		{!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Ingresa la descripción de la productividad'])!!}

		{!!Form::label('facultad','Elija el proyecto de investigación al cual asignar la productividad:')!!}
		<select id="id_project" class="form-control" name="id_project">
			@foreach($projects as $project)
  			<option value="{{$project->id}}">{{$project->name}}</option>
		  	@endforeach
		</select>
	</div>
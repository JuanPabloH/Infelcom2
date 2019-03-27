<div class="form-group">
		{!!Form::label('code','Codigo:')!!}
		{!!Form::text('code',null,['class'=>'form-control','placeholder'=>'Ingresa el codigo del semillero'])!!}
		{!!Form::label('name','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del semillero'])!!}
		{!!Form::label('status','Estado:')!!}
		<select id="status" class="form-control" name="status">
  			<option value="Activo">Activo</option>
  			<option value="Inactivo">Inactivo</option>
		</select>
		{!!Form::label('objective','Objetivo:')!!}
		{!!Form::textarea('objective',null,['class'=>'form-control','placeholder'=>'Ingresa el objetivo del semillero'])!!}

		{!!Form::label('facultad','Elija la linea de investigación del semillero:')!!}
		<select id="id_line" class="form-control" name="id_line">
			@foreach($lines as $line)
  			<option value="{{$line->id}}">{{$line->name}}</option>
		  	@endforeach
		</select>
	</div>
<div class="form-group">
		{!!Form::label('code','Codigo:')!!}
		{!!Form::text('code',null,['class'=>'form-control','placeholder'=>'Ingresa el codigo del semillero'])!!}
		{!!Form::label('name','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del semillero'])!!}
		{!!Form::label('status','Estado:')!!}
		{!!Form::text('status',null,['class'=>'form-control','placeholder'=>'Ingresa el estado del semillero'])!!}
		{!!Form::label('objective','Objetivo:')!!}
		{!!Form::textarea('objective',null,['class'=>'form-control','placeholder'=>'Ingresa el objetivo del semillero'])!!}

		{!!Form::label('facultad','Elija la linea de investigación del semillero:')!!}
		<select id="id_line" class="form-control" name="id_line">
			@foreach($lines as $line)
  			<option value="{{$line->id}}">{{$line->name}}</option>
		  	@endforeach
		</select>
	</div>
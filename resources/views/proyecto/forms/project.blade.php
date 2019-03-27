<div class="form-group">
		{!!Form::label('code','Codigo:')!!}
		{!!Form::text('code',null,['class'=>'form-control','placeholder'=>'Ingresa el codigo del proyecto'])!!}
		
		{!!Form::label('name','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del proyecto'])!!}
		
		{!!Form::label('status','Estado:')!!}
		<select id="status" class="form-control" name="status">
  			<option value="Activo">Activo</option>
  			<option value="Inactivo">Inactivo</option>
		</select>
		
		{!!Form::label('objective','Objetivo:')!!}
		{!!Form::textarea('objective',null,['class'=>'form-control','placeholder'=>'Ingresa el objetivo del proyecto'])!!}
		
		
		
		{!!Form::label('duration','Duracion (Meses):')!!}
		{!!Form::text('duration',null,['class'=>'form-control','placeholder'=>'Ingresa la duración del proyecto'])!!}
		
		{!!Form::label('sumary','Resumen:')!!}
		{!!Form::textarea('sumary',null,['class'=>'form-control','placeholder'=>'Ingresa el resumen del proyecto'])!!}
		
		{!!Form::label('financing','Financiación:')!!}
		{!!Form::text('financing',null,['class'=>'form-control','placeholder'=>'Ingresa la financiación del proyecto'])!!}
		
		{!!Form::label('valueProject','Valor del proyecto:')!!}
		{!!Form::text('valueProject',null,['class'=>'form-control','placeholder'=>'Ingresa el valor del proyecto'])!!}

		{!!Form::label('linea','Elija la linea de investigación del proyecto:')!!}
		<select id="id_line" class="form-control" name="id_line">
			@foreach($lines as $line)
  			<option value="{{$line->id}}">{{$line->name}}</option>
		  	@endforeach
		</select>

		{!!Form::label('startDate','Ingrese la fecha de inicio:')!!}
		{!!Form::date('startDate')!!}
	</div>
	<br>
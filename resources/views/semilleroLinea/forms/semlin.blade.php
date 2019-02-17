<div class="form-group">
	
		{!!Form::label('linea','Elija la linea de investigación:')!!}
		<select id="id_line" class="form-control" name="id_line">
			@foreach($lineas as $linea)
  			<option value="{{$linea->id}}">{{$linea->name}}</option>
		  	@endforeach
		</select>
	</div>

<div class="form-group">
	
		{!!Form::label('hotbed','Elija el semillero a relacionar:')!!}
		<select id="id_hotbed" class="form-control" name="id_hotbed">
			@foreach($hotbeds as $hotbed)
  			<option value="{{$hotbed->id}}">{{$hotbed->name}}</option>
		  	@endforeach
		</select>
	</div>
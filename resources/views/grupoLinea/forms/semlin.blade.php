<div class="form-group">
	
		{!!Form::label('linea','Elija la linea de investigación:')!!}
		<select id="id_line" class="form-control" name="id_line">
			@foreach($lineas as $linea)
  			<option value="{{$linea->id}}">{{$linea->name}}</option>
		  	@endforeach
		</select>
	</div>

<div class="form-group">
	
		{!!Form::label('group','Elija el grupo a relacionar:')!!}
		<select id="id_group" class="form-control" name="id_group">
			@foreach($groups as $group)
  			<option value="{{$group->id}}">{{$group->name}}</option>
		  	@endforeach
		</select>
	</div>
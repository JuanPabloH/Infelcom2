<div class="form-group">
	
		{!!Form::label('area','Elija el área de investigación:')!!}
		<select id="id_area" class="form-control" name="id_area">
			@foreach($areas as $area)
  			<option value="{{$area->id}}">{{$area->name}}</option>
		  	@endforeach
		</select>
	</div>

<div class="form-group">
	
		{!!Form::label('hotbed','Elija el grupo a relacionar:')!!}
		<select id="id_hotbed" class="form-control" name="id_hotbed">
			@foreach($hotbeds as $hotbed)
  			<option value="{{$hotbed->id}}">{{$hotbed->name}}</option>
		  	@endforeach
		</select>
	</div>
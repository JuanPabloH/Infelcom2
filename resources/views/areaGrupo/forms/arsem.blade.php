<div class="form-group">
	
		{!!Form::label('area','Elija el área de investigación:')!!}
		<select id="id_area" class="form-control" name="id_area">
			@foreach($areas as $area)
  			<option value="{{$area->id}}">{{$area->name}}</option>
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
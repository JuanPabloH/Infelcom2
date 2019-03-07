<div class="form-group">
	
		{!!Form::label('user','Elija el usuario:')!!}
		<select id="id_user" class="form-control" name="id_user">
			@foreach($users as $user)
			@if(!$user->hasRole('admin'))
  			<option value="{{$user->id}}">{{$user->name}}</option>
		  	@endif
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
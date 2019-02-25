@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')
	<nav class="navbar navbar-light bg-light">		
	  	{!! Form::open(['route'=>'userSemillero.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right', 'role'=>'search']) !!}

	    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de semillero']) !!}
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    {!! Form::close() !!}
	</nav>
	@foreach($hotbeds as $hotbed)
	<strong><h3>{{$hotbed->name}}</h3></strong>
	<h5>Usuarios pertenecientes</h5>
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($user_semilleros as $usersemillero)
				@if($hotbed->id == $usersemillero->id_hotbed) 
				<tr>
					<?php $user=App\user::find($usersemillero->id_user) ?>	
		        	<td>{{$user->name}}</td>		
					<td>{{$user->email}}</td>		
					<td>
						{!!Form::open(['route'=>['userSemillero.destroy', $usersemillero], 'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</td>	
				</tr>
				@endif

			@endforeach
		</tbody>
		
	</table>
	@endforeach
	{!!$hotbeds->render()!!}
	@endsection

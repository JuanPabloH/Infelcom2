@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')
	@foreach($lineas as $linea)
	<strong><h3>{{$linea->name}}</h3></strong>
	<h5>Grupos pertenecientes</h5>
	<table class="table">
		<thead>
			<th>Nombre Grupo</th>
			<th>Acronimo</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($grupo_lineas as $grupo_linea)
				@if($linea->id == $grupo_linea->id_line) 
				<tr>
					<?php $group=App\Group::find($grupo_linea->id_group) ?>	
		        	<td>{{$group->name}}</td>		
					<td>{{$group->acronym}}</td>		
					<td>
						{!!Form::open(['route'=>['grupoLinea.destroy', $grupo_linea], 'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</td>	
				</tr>
				@endif

			@endforeach
		</tbody>
		
	</table>
	@endforeach
	{!!$lineas->render()!!}
	@endsection

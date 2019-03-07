@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')
	@foreach($areas as $area)
	<strong><h3>{{$area->name}}</h3></strong>
	<h5>Grupos pertenecientes</h5>
	<table class="table">
		<thead>
			<th>Nombre Grupo</th>
			<th>Acronimo</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($area_semilleros as $areasemillero)
				@if($area->id == $areasemillero->id_area) 
				<tr>
					<?php $group=App\Group::find($areasemillero->id_group) ?>	
		        	<td>{{$group->name}}</td>		
					<td>{{$group->acronym}}</td>		
					<td>
						{!!Form::open(['route'=>['areaGrupo.destroy', $areasemillero], 'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</td>	
				</tr>
				@endif

			@endforeach
		</tbody>
		
	</table>
	@endforeach
	{!!$areas->render()!!}
	@endsection

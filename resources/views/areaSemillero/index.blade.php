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
	<h5>Semilleros pertenecientes</h5>
	<table class="table">
		<thead>
			<th>Nombre Semillero</th>
			<th>Acronimo</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($area_semilleros as $areasemillero)
				@if($area->id == $areasemillero->id_area) 
				<tr>
					<?php $hotbed=App\Hotbed::find($areasemillero->id_hotbed) ?>	
		        	<td>{{$hotbed->name}}</td>		
					<td>{{$hotbed->acronym}}</td>		
					<td>
						{!!Form::open(['route'=>['areaSemillero.destroy', $areasemillero], 'method' => 'DELETE'])!!}
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

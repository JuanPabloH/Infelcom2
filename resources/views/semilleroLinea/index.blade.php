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
	<h5>Semilleros pertenecientes</h5>
	<table class="table">
		<thead>
			<th>Nombre Semillero</th>
			<th>Acronimo</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($semillero_lineas as $semillero_linea)
				@if($linea->id == $semillero_linea->id_line) 
				<tr>
					<?php $hotbed=App\Hotbed::find($semillero_linea->id_hotbed) ?>	
		        	<td>{{$hotbed->name}}</td>		
					<td>{{$hotbed->acronym}}</td>		
					<td>
						{!!Form::open(['route'=>['semilleroLinea.destroy', $semillero_linea], 'method' => 'DELETE'])!!}
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

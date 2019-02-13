@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')
	<table class="table">
		<thead>
			<th>Clasificaión</th>
			<th>Nombre</th>
			<th>Fecha de creación</th>
			<th>Correo</th>
		    <th>Acronimo</th>
		    <th>Sitio Web</th>
			<th>Objetivo</th>
			<th>Misión</th>
			<th>Visión</th>
			<th>Plan de trabajo</th>
			<th>Acciones</th>
		</thead>
		
		<tbody>
			@foreach($hotbeds as $hotbed)
			<tr>
				<td>{{$hotbed->classification}}</td>
				<td>{{$hotbed->name}}</td>
				<td>{{$hotbed->creationDate}}</td>
		        <td>{{$hotbed->email}}</td>
		        <td>{{$hotbed->acronym}}</td>
		        <td>{{$hotbed->website}}</td>
		        <td>{{$hotbed->objective}}</td>
		        <td>{{$hotbed->mision}}</td>
		        <td>{{$hotbed->vision}}</td>
		        <td>{{$hotbed->workplan}}</td>
				<td>
					{!!link_to_route('semillero.edit', $title = 'Editar', $parameters = $hotbed, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$hotbeds->render()!!}
	@endsection

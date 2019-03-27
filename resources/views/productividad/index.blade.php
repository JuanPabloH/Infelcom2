@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')
	<nav class="navbar navbar-light bg-light">		
	  	{!! Form::open(['route'=>'productividad.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right', 'role'=>'search']) !!}

	    {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Ingrese la descripción']) !!}
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    {!! Form::close() !!}
	</nav>
	<table class="table">
		<thead>		
			<th>DESCRIPCIÓN</th>
			<th>ARCHIVO</th>
			<th>PROYECTO</th>
			<th>OPERACIÓN</th>
		</thead>
		
		<tbody>
			@foreach($productivities as $productivity)
			<tr>
		        <td>{{$productivity->description}}</td>
		        <td>
		        	<a target="_blank" href="{{url("/productividad/productividadFiles/$productivity->id.$productivity->file") }}"> Ver Documento</a>		        	
		        </td>
		        <td>
		        	@foreach($projects as $project)
			        	@if($project->id==$productivity->id_project)
			        	{{$project->name}}
			        	@endif
		        	@endforeach
		        </td>
				<td>
					{!!link_to_route('productividad.edit', $title = 'Editar', $parameters = $productivity, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$productivities->appends(Request::only(['name']))->render()!!}
	@endsection

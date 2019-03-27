@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')

	<nav class="navbar navbar-light bg-light">		
	  	{!! Form::open(['route'=>'noticia.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right', 'role'=>'search']) !!}

	    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la noticia a buscar']) !!}
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	    {!! Form::close() !!}
	</nav>
	<table class="table">
		<thead>		
			<th>Nombre</th>
			<th>Foto</th>
			<th>Descripción</th>
			<th>Fecha</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($notices as $notice)
			<tr>
				<td>{{$notice->name}}</td>
				<td>
		        	@if($notice->photo)
		        		<img width="100px" src=" {{ url("/noticia/noticiaImages/$notice->id.$notice->photo") }} ">		        				        
		        	@endif
		        </td>
				<td>{{$notice->created_at}}</td>
		        <td>{{$notice->description}}</td>		        		        
				<td>
					{!!link_to_route('noticia.edit', $title = 'Editar', $parameters = $notice, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$notices->appends(Request::only(['name']))->render()!!}
	@endsection

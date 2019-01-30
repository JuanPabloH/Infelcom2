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
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Foto</th>
			<th>Correo</th>
		    <th>Documento</th>
		    <th>Hoja de vida</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->last_name}}</td>
				<td>
		        	@if($user->photo)
		        		<img width="100px" src=" {{ url("/usuario/images/$user->photo") }} ">
		        		@else
		        		<img width="100px" src=" {{ url("/usuario/images/default.png") }} ">
		        	@endif
		        </td>
		        <td>{{$user->email}}</td>
		        <td>{{$user->document}}</td>
		        <td><a href="{{$user->cv}}" target="_blank">Ver hoja de vida</a></td>
				<td>
					{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$users->render()!!}
	@endsection

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
			<th>CÓDIGO DE FACULTAD</th>
			<th>NOMBRE</th>
			<th>OPERACIÓN</th>
		</thead>
		
		<tbody>
			@foreach($faculties as $faculty)
			<tr>
				<td>{{$faculty->code}}</td>
		        <td>{{$faculty->name}}</td>
				<td>
					{!!link_to_route('facultad.edit', $title = 'Editar', $parameters = $faculty, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$faculties->render()!!}
	@endsection

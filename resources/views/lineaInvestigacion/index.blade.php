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
			<th>Id</th>
			<th>Name</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($line_of_investigations as $line_of_investigation)
			<tr>
				<td>{{$line_of_investigation->id}}</td>
		        <td>{{$line_of_investigation->name}}</td>
				<td>
					{!!link_to_route('lineaInvestigacion.edit', $title = 'Editar', $parameters = $line_of_investigation, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$line_of_investigations->render()!!}
	@endsection

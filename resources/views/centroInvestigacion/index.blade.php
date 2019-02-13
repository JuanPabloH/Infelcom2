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
			@foreach($researchCenters as $researchCenter)
			<tr>
				<td>{{$researchCenter->id}}</td>
		        <td>{{$researchCenter->name}}</td>
				<td>
					{!!link_to_route('centroInvestigacion.edit', $title = 'Editar', $parameters = $researchCenter, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$researchCenters->render()!!}
	@endsection

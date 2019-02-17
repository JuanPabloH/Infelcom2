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
			@foreach($researchAreas as $researchArea)
			<tr>
				<td>{{$researchArea->id}}</td>
		        <td>{{$researchArea->name}}</td>
				<td>
					{!!link_to_route('areaInvestigacion.edit', $title = 'Editar', $parameters = $researchArea, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$researchAreas->render()!!}
	@endsection

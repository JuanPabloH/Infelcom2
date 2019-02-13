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
			<th>Codigo</th>
			<th>Name</th>
			<th>Facultad</th>
			<th>Operacion</th>
		</thead>
		
		<tbody>
			@foreach($schools as $school)
			<tr>
				<td>{{$school->code}}</td>
		        <td>{{$school->name}}</td>
		        @foreach($faculties as $faculty)
		        	@if($school->id_faculty == $faculty->id)
		        	<td>{{$faculty->name}}</td>
		        	@endif
		        @endforeach
				<td>
					{!!link_to_route('escuela.edit', $title = 'Editar', $parameters = $school, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>	
			</tr>

			@endforeach
		</tbody>
		
	</table>
	{!!$schools->render()!!}
	@endsection

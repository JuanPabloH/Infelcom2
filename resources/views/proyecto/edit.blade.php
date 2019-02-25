@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($project,['route'=>['proyecto.update',$project],'method'=>'PUT'])!!}
			@include('proyecto.forms.project')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['proyecto.destroy', $project], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($school,['route'=>['escuela.update',$school],'method'=>'PUT'])!!}
			@include('escuela.forms.school')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['escuela.destroy', $school], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
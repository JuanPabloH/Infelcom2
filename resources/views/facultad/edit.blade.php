@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($faculty,['route'=>['facultad.update',$faculty],'method'=>'PUT'])!!}
			@include('facultad.forms.faculty')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['facultad.destroy', $faculty], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
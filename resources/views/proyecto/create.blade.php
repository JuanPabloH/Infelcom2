@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'proyecto.store', 'method'=>'POST'])!!}
		@include('proyecto.forms.project')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
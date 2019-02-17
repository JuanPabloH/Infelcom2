@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'semilleroLinea.store', 'method'=>'POST'])!!}
		@include('semilleroLinea.forms.semlin')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
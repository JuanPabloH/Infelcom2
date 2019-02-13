@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'centroInvestigacion.store', 'method'=>'POST'])!!}
		@include('centroInvestigacion.forms.center')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
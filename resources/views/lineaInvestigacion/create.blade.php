@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'lineaInvestigacion.store', 'method'=>'POST'])!!}
		@include('lineaInvestigacion.forms.line')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
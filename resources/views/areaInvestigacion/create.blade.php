@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'areaInvestigacion.store', 'method'=>'POST'])!!}
		@include('areaInvestigacion.forms.area')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
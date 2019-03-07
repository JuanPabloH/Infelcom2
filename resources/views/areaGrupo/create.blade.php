@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'areaGrupo.store', 'method'=>'POST'])!!}
		@include('areaGrupo.forms.arsem')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
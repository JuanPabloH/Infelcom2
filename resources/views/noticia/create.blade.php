@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'noticia.store', 'method'=>'POST','files'=>true])!!}
		@include('noticia.forms.notice')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
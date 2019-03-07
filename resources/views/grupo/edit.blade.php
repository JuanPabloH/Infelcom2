@extends('layouts.admin')
	@section('content')
		@include('alerts.request')
		{!!Form::model($group,['route'=>['grupo.update',$group],'method'=>'PUT'])!!}
			@include('grupo.forms.group')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

	@endsection
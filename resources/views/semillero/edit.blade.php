@extends('layouts.admin')
	@section('content')
		@include('alerts.request')
		{!!Form::model($hotbed,['route'=>['semillero.update',$hotbed],'method'=>'PUT'])!!}
			@include('semillero.forms.hotbed')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['semillero.destroy', $hotbed], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
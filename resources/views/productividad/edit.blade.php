@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($productivity,['route'=>['productividad.update',$productivity],'method'=>'PUT','files'=>true])!!}
			@include('productividad.forms.productivity')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['productividad.destroy', $productivity], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger','style'=>'color: #fff;'])!!}
		{!!Form::close()!!}
	@endsection
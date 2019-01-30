@extends('layouts.admin')
	@section('content')
		@include('alerts.request')
		@if(Auth::user()->hasRole('admin'))
			{!!Form::model($user,['route'=>['usuario.update',$user],'method'=>'PUT','files'=>true])!!}
				@include('usuario.forms.usredit')
				{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}

			{!!Form::open(['route'=>['usuario.destroy', $user], 'method' => 'DELETE'])!!}
				{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}
		@else
			{!!Form::model($user,['route'=>['usuario.update',$user],'method'=>'PUT','files'=>true])!!}
				@include('usuario.forms.usr')
				{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}
		@endif
	@endsection
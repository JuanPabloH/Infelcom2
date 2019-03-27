@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($notice,['route'=>['noticia.update',$notice],'method'=>'PUT','files'=>true])!!}
			@include('noticia.forms.notice')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['noticia.destroy', $notice], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
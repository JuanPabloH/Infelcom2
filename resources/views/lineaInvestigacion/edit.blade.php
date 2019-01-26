@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($line_of_investigation,['route'=>['lineaInvestigacion.update',$line_of_investigation],'method'=>'PUT'])!!}
			@include('lineaInvestigacion.forms.line')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['lineaInvestigacion.destroy', $line_of_investigation], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
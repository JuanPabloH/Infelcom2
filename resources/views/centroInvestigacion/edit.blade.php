@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($researchCenter,['route'=>['centroInvestigacion.update',$researchCenter],'method'=>'PUT'])!!}
			@include('centroInvestigacion.forms.center')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['centroInvestigacion.destroy', $researchCenter], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
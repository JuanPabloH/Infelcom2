@extends('layouts.admin')
	@section('content')
		@include('alerts.request')

		{!!Form::model($researchArea,['route'=>['areaInvestigacion.update',$researchArea],'method'=>'PUT'])!!}
			@include('areaInvestigacion.forms.area')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['areaInvestigacion.destroy', $researchArea], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection
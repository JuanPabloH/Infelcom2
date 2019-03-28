@extends('layouts.admin')
@section('content')


<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>EDITAR ÁREA DE INVESTIGACIÓN</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')

                {!!Form::model($researchArea,['route'=>['areaInvestigacion.update',$researchArea],'method'=>'PUT'])!!}
                @include('areaInvestigacion.forms.area')

                <tabla class="table">
                    <tr>
                        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
                        {!!Form::close()!!}</tr>

                    <tr>

                        {!!Form::open(['route'=>['areaInvestigacion.destroy', $researchArea], 'method' => 'DELETE'])!!}
                        {!!Form::submit('Eliminar',['class'=>'btn btn-danger','style'=>'color: #000;'])!!}
                        {!!Form::close()!!}</tr>
                    <table>

            </div>
        </div>
    </div>

</div>
@endsection 
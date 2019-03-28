@extends('layouts.admin')
@section('content')

<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>EDITAR PROYECTO</h3>
                </nav>
            </div>
            @include('alerts.request')

            {!!Form::model($project,['route'=>['proyecto.update',$project],'method'=>'PUT'])!!}
            @include('proyecto.forms.project')

            <table class="table">
                <tr>
                    {!!Form::submit('Actualizar',['class'=>'btn btn-primary','style'=>'color: #fff;'])!!}
                    {!!Form::close()!!}</tr>

                <tr>
                    {!!Form::open(['route'=>['proyecto.destroy', $project], 'method' => 'DELETE'])!!}
                    {!!Form::submit('Eliminar',['class'=>'btn btn-danger','style'=>'color: #fff;'])!!}
                    {!!Form::close()!!}</tr>

            </table>


        </div>
    </div>

</div>
@endsection 
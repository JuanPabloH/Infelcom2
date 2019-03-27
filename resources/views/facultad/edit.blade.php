@extends('layouts.admin')
@section('content')

<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>EDITAR FACULTAD</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')

                {!!Form::model($faculty,['route'=>['facultad.update',$faculty],'method'=>'PUT'])!!}
                @include('facultad.forms.faculty')

            </div>

            <div class="container text-center">

                <table class="table">
                    <tr>{!!Form::submit('Actualizar',['class'=>'btn btn-ligth'])!!}
                        {!!Form::close()!!}
                    </tr>
                    <tr>
                        {!!Form::open(['route'=>['facultad.destroy', $faculty], 'method' => 'DELETE'])!!}
                        {!!Form::submit('Eliminar',['class'=>'btn btn-LIGTH'])!!}
                        {!!Form::close()!!}</tr>
                </table>


            </div>
            @endsection 
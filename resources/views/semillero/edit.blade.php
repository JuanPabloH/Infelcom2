@extends('layouts.admin')
@section('content')

<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>AGREGAR NOTICIA O EVENTO</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')

                {!!Form::model($hotbed,['route'=>['semillero.update',$hotbed],'method'=>'PUT'])!!}
                @include('semillero.forms.hotbed')
                <table class="table">
                    <tr>
                        {!!Form::submit('Actualizar',['class'=>'btn btn-primary','style'=>'color: #fff;'])!!}
                        {!!Form::close()!!}</tr>
                    <tr>

                        {!!Form::open(['route'=>['semillero.destroy', $hotbed], 'method' => 'DELETE'])!!}
                        {!!Form::submit('Eliminar',['class'=>'btn btn-danger','style'=>'color: #fff;'])!!}
                        {!!Form::close()!!}</tr>
        
                </table>


            </div>
        </div>

    </div>
    @endsection 
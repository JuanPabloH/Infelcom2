@extends('layouts.admin')
@section('content')
<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>EDITAR ESCUELA</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')

                {!!Form::model($school,['route'=>['escuela.update',$school],'method'=>'PUT'])!!}
                @include('escuela.forms.school')


            </div>

            <table class="table">
                <tr>{!!Form::submit('Actualizar',['class'=>'btn btn-primary','style'=>'color: #fff;'])!!}
                    {!!Form::close()!!}
                </tr>

                <tr>
                    {!!Form::open(['route'=>['escuela.destroy', $school], 'method' => 'DELETE'])!!}
                    {!!Form::submit('Eliminar',['class'=>'btn btn-danger','style'=>'color: #fff;'])!!}
                    {!!Form::close()!!}</tr>
            </table>



        </div>
    </div>

</div>
@endsection 
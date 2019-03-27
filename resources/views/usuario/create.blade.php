@extends('layouts.admin')
@section('content')


<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>AGREGAR USUARIO</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')
                {!!Form::open(['route'=>'usuario.store', 'method'=>'POST','files'=>true])!!}
                @include('usuario.forms.usr')

            </div>

            <table class="table text-center">
                <tr>{!!Form::submit('Registrar',['class'=>'btn btn-ligth'])!!}
                    {!!Form::close()!!}</tr>
            </table>


        </div>
    </div>

</div>
@endsection 
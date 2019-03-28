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

            </div>

            <table class="table">

                <tr>{!!Form::open(['route'=>'noticia.store', 'method'=>'POST','files'=>true])!!}
                    @include('noticia.forms.notice')</tr>
                <tr>
                    {!!Form::submit('Registrar',['class'=>'btn btn-primary','style'=>'color: #fff;'])!!}
                    {!!Form::close()!!}</tr>
            </table>


        </div>
    </div>

</div>
@endsection 
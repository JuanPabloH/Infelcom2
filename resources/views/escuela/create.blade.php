@extends('layouts.admin')
@section('content')

<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>AGREGAR ESCUELA</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')
                {!!Form::open(['route'=>'escuela.store', 'method'=>'POST'])!!}
                @include('escuela.forms.school')
                {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
                {!!Form::close()!!}

            </div>
        </div>
    </div>

</div>

@endsection 

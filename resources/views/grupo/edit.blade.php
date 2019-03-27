@extends('layouts.admin')
@section('content')

<div class="row align-items-center">
    <div class="col" style="padding-left: 200px;">
        <div class="card" style="width: 90rem;">
            <div class="card-header text-center">
                <nav class="navbar navbar-light bg-info">
                    <h3>MODIFICAR INFORMACIÓN DE LA PÁGINA PRINCIPAL</h3>
                </nav>
            </div>
            <div class="card-body">
                @include('alerts.request')
                {!!Form::model($group,['route'=>['grupo.update',$group],'method'=>'PUT'])!!}
                @include('grupo.forms.group')
                {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>

</div>

@endsection 
<div class="form-group">
		{!!Form::label('clasification','Elija la clasificación del semillero:')!!}
		<select id="classification" class="form-control" name="classification">
  			<option value="A">A</option>
  			<option value="B">B</option>
  			<option value="C">C</option>
		</select>
		</div>
<div class="from-group">
			{!!Form::label('school','Elija el centro de investigacion del semillero:')!!}
		<select id="id_research_center" class="form-control" name="id_research_center">
			@foreach($centros as $researchCenter)
  			<option value="{{$researchCenter->id}}">{{$researchCenter->name}}</option>
		  	@endforeach
		</select>
		</div>
		
<div class="from-group">
			{!!Form::label('school','Elija la escuela a la cual pertenece el semillero:')!!}
		<select id="id_school" class="form-control" name="id_school">
			@foreach($schools as $school)
  			<option value="{{$school->id}}">{{$school->name}}</option>
		  	@endforeach
		</select>
		</div>



<div class="form-group">
		{!!Form::label('name','Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el documento del usuario'])!!}
	</div>
<div class="form-group">
		{!!Form::label('creationDate','Ingrese la fecha de creacion:')!!}
		{!!Form::date('creationDate')!!}
	</div>
<div class="form-group">
		{!!Form::label('acronym','Acronimo:')!!}
		{!!Form::text('acronym',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('email','Email:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el apellido del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('website','Sitio Web:')!!}
		{!!Form::text('website',null,['class'=>'form-control','placeholder'=>'Ingresa el cv del usuario'])!!}
	</div>
	
	<div class="form-group">
		{!!Form::label('objective','Objetivo:')!!}
		{!!Form::textarea('objective',null,['class'=>'form-control','placeholder'=>'Ingresa el email del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('mision','Misión:')!!}
		{!!Form::textarea('mision',null,['class'=>'form-control','placeholder'=>'Ingresa el email del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('vision','Visión:')!!}
		{!!Form::textarea('vision',null,['class'=>'form-control','placeholder'=>'Ingresa el email del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('workplan','Plan de trabajo:')!!}
		{!!Form::textarea('workplan',null,['class'=>'form-control','placeholder'=>'Ingresa el email del usuario'])!!}
	</div>
	

	                        
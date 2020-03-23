@extends('layouts.app')

@section('title', 'Formulario')

@section('content')

<div class="big-padding">
  <h1>Bienvenido al formulario</h1>
</div>


<div class="container">
    <h3>Crea tu usuario</h3>
    <hr>
    {!! Form::open(['url' => '/forms', 'method' => 'POST']) !!}
    
        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1">Nombre</label>
                {{ Form::text('nombre','' ,['class' => 'form-control', 'placeholder' => 'Digite el nombre']) }}
            </div>

            <div class="col">
                <label for="exampleFormControlInput1">Apellido</label>
                {{ Form::text('apellido','' ,['class' => 'form-control', 'placeholder' => 'Digite el apellido']) }}
            </div>

          </div>         
          
          <div class="row mt-2">
              <div class="col">
                <label for="exampleFormControlInput1">Cedula</label>

                {{ Form::number('cedula','' ,['class' => 'form-control', 'placeholder' => 'Digite el numero de identificación']) }}

              </div>

              <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Genero</label>                    

                   {{ Form::select('sexo', ['0' => 'Femenino', '1' => 'Masculino' ], null , ['class' => 'form-control']) }}                
                  </div>
            </div> 

          </div> 
          
          <div class="row mt-2">

              <div class="col">
                <label for="exampleFormControlSelect1">Fecha de nacimiento</label>

                {{ Form::date('fecha_nacimiento','' ,['class' => 'form-control', ]) }}                
              </div>


              <div class="col mt-4">
                <a href="{{url('/forms')}}">Volver al listado</a>
                <input type="submit" value="Enviar" class="btn btn-success">
              </div>
          </div>

          
      {!! Form::close() !!}
</div>

@endsection
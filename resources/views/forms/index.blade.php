@extends('layouts.app');

@section('content')

<div class="big-padding">
    <h1>Usuarios creados</h1>
</div>


<div class="container">


    <p>
        Porcentaje Hombres: {{$generoPorcentaje->masculino}}%, Mujeres: {{$generoPorcentaje->femenino}}%
    </p>
   
        <p>
            Nombre m&aacute;s repetido {{$nombreRepetido->nombre}}, cantidad de veces que se repite: {{$nombreRepetido->repetido}}
        </p>

    <table class="table table-bordered">
        <thead>
            <th>
                <td>Cedula</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Sexo</td>
                <td>Fecha de nacimiento</td>
                <td>Signo zodiacal</td>
                <td>Edad</td>
                <td>Opcional Milenial</td>

            </th>
        </thead>
        <tbody>
            @foreach ($forms as $form)
                <tr>
                    <td>{{ $form->id }}</td>
                    <td>{{ $form->cedula }}</td>
                    <td>{{ $form->nombre }}</td>
                    <td>{{ $form->apellido }}</td>
                    <td>{{ $form->sexoDescripcion }}</td>
                    <td>{{ $form->fecha_nacimiento }}</td>
                    <td>{{ $form->zodiacSign }}</td>
                    <td>{{ $form->edad }}</td>
                    <td class="{{ $form->milenial ? 'bg-danger text-white' : ''}}">{{ $form->milenial ? 'CUIDADO ES MILENIAL' : ''}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<div class="floating">
    <a href="{{url('/')}}" class="btn btn-success">
        <i class="material-icons">add</i>
    </a>
</div>


@endsection

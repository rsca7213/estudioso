@extends('layouts.app')

@section('title')
    <title> Estudioso | Menú Principal </title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
@endsection

@section('navbar')
    <li> <a href="{{ route('verCursos', ['user_id' => auth()->user()->id]) }}" class="text-muted mx-4 text-nowrap"> Ver Cursos </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id ]) }}" class="text-muted mx-4 text-nowrap"> Agregar Curso </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => 0  ]) }}" class="text-muted mx-4 text-nowrap"> Calendario </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('home') }}" class="text-dark mx-4 text-nowrap"> <u> Menú Principal </u> </a> </li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card rounded-lg border border-light">
            <div class="card-header text-center bg-dark text-light">
                <span class="h4"> Evaluaciones Proximas </span>
            </div>
            <div class="card-body" style="background-color: #F5F5F5">
                <table class="table table-striped table-hover border border-secondary"> 
                    <thead class="thead-dark"> 
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Curso </th>
                            <th scope="col"> Evaluación </th>
                            <th scope="col"> Fecha </th>
                            <th scope="col"> Ponderación </th>
                        </tr>
                    </thead>
                    <tbody>
                        <span style="visibility: hidden;"> {{ $existe = "En estos momentos no tiene evaluaciones próximas." }}</span>
                        @foreach ($evs as $ev)
                            <span style="visibility: hidden;"> {{ $existe = "" }}</span>
                            <tr style="transform: rotate(0);">
                                <th scope="row"> <a href="/cursos/ver/{{auth()->user()->id}}/evaluaciones/{{$cursos[$loop->index]->id}}" class="stretched-link text-dark"> {{$loop->iteration}} </a> </th>
                                <td> {{ $cursos[$loop->index]->nombre }} </td>
                                <td> {{ $ev['nombre'] }} </td>
                                <td>
                                    {{ date('d/m/Y', strtotime($ev['fecha'])) }} 
                                    <dias-evaluacion dias="{{ $dias[$loop->index] }}"> </dias-evaluacion> 
                                </td>
                                <td> {{ $ev['porcentaje'] }}% ({{ $ev['porcentaje']*20/100 }} puntos de 20)</td>
                            </tr>
                            @if ($loop->iteration == 7) @break @endif
                        @endforeach
                    </tbody>
                </table>
                <span class="text-center"> {{ $existe }} </span>
            </div>
            <div class="card-footer bg-dark text-light d-flex justify-content-between">
                <a href="#" class="btn btn-secondary mx-3"> Ver Calendario </a>
                <div>
                    <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id ]) }}" class="btn btn-secondary mx-3"> Agregar Curso </a>
                    <a href="{{ route('verCursos', ['user_id' => auth()->user()->id]) }}" class="btn btn-primary mx-3"> Ver Cursos </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

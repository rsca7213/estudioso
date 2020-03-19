@extends('layouts.app')

@section('title')
    <title> Estudioso | Ver Evaluaciones </title>
    <link rel="icon" href=" {{ asset('img/favicon.png') }}">
@endsection

@section('navbar')
    <li> <a href="{{ route('verCursos', ['user_id' => auth()->user()->id]) }}" class="text-dark"> <u>Ver Cursos </u> </a> </li>
    <span class="text-muted hidden d-none d-lg-block mx-4"> | </span>
    <span class="text-muted hidden d-none d-md-block d-lg-none mx-2"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id]) }}" class="text-muted">Agregar Curso </a> </li>
    <span class="text-muted hidden d-none d-lg-block mx-4"> | </span>
    <span class="text-muted hidden d-none d-md-block d-lg-none mx-2"> | </span>
    <li> <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => 0  ]) }}" class="text-muted">Calendario </a> </li>
    <span class="text-muted hidden d-none d-lg-block mx-4"> | </span>
    <span class="text-muted hidden d-none d-md-block d-lg-none mx-2"> | </span>
    <li> <a href="{{ route('home') }}" class="text-muted">Menú Principal </a> </li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card rounded-lg border border-light">
            <div class="card-header text-center bg-dark text-light">
                <span class="h4"> {{ $curso->nombre }} </span>
            </div>
            <div class="card-body border border-secondary" style="background-color: #F5F5F5">
                <table class="table table-striped table-hover border border-secondary"> 
                    <hr class="bg-secondary">
                    <h4 class="text-center"> Evaluaciones del Curso </h4>
                    <thead class="thead-dark"> 
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Nombre </th>
                            <th scope="col" class="text-center"> Fecha </th>
                            <th scope="col" class="text-center"> Porcentaje </th>
                            <th scope="col" class="text-center"> Calificación </th>
                        </tr>
                    </thead>
                    <tbody>
                        <span style="display: none">{{ $existe = false }} </span>
                        @foreach ($evs as $ev)
                        <span style="display: none">{{ $existe = true }} </span>
                        <tr>
                            <th scope="row"> {{ $loop->iteration }} </th>
                            <td> {{ $ev->nombre }} </td>
                            <td class="text-center"> {{ date('d/m/Y', strtotime($ev->fecha)) }} </td>
                            <td class="text-center"> {{ $ev->porcentaje }}% </td>
                            <td class="text-center"> <calif-comp calif="{{ $ev->calificacion }}" 
                                                                 evid="{{ $ev->id }}" 
                                                                 evn="{{ $ev->nombre }}" 
                                                                 csrf="{{ csrf_token() }}" 
                                                                 cid="{{ $curso->id }}" 
                                                                 uid="{{ $user->id }}"> </calif-comp> </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
                <sin-evaluaciones ex="{{ $existe }}"> </sin-evaluaciones>
            </div>
            <div class="card-footer bg-dark text-light d-flex justify-content-between">
                <borrar-curso uid="{{ $user->id }}" cid="{{ $curso->id }}" csrf="{{ csrf_token() }}" cn="{{ $curso->nombre }}"> </borrar-curso>
                <a href="/cursos/agregar/{{$user->id}}/{{$curso->id}}/evaluaciones" class="btn btn-secondary mx-3"> Editar Curso </a>
                <info-button cid="{{ $curso->id }}" cn="{{ $curso->nombre}}" uid="{{ $user->id }}"> </info-button>
            </div>
        </div>
    </div>
</div>
@endsection
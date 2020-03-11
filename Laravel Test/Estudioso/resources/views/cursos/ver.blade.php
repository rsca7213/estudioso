@extends('layouts.app')

@section('title')
    <title> Estudioso | Ver Cursos </title>
    <link rel="icon" href=" {{ asset('img/favicon.png') }}">
@endsection

@section('navbar')
    <li> <a href="{{ route('verCursos', ['user_id' => auth()->user()->id]) }}" class="text-dark"> <u>Ver Cursos </u> </a> </li>
    <span class="text-muted hidden d-none d-lg-block mx-4"> | </span>
    <span class="text-muted hidden d-none d-md-block d-lg-none mx-2"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id]) }}" class="text-muted">Agregar Curso </a> </li>
    <span class="text-muted hidden d-none d-lg-block mx-4"> | </span>
    <span class="text-muted hidden d-none d-md-block d-lg-none mx-2"> | </span>
    <li> <a href="#" class="text-muted">Calendario </a> </li>
    <span class="text-muted hidden d-none d-lg-block mx-4"> | </span>
    <span class="text-muted hidden d-none d-md-block d-lg-none mx-2"> | </span>
    <li> <a href="{{ route('home') }}" class="text-muted">Menú Principal </a> </li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card rounded-lg border border-light">
                <div class="card-header text-center bg-dark text-light">
                    <span class="h4"> Mis Cursos </span>
                </div>
                <div class="card-body border border-secondary" style="background-color: #F5F5F5">
                    <span style="display: none">{{ $existe = false }} </span>
                    @foreach ($cursos as $curso)
                        <span style="display: none">{{ $existe = true }} </span>
                        <hr>
                        <div class="row align-items-baseline d-flex justify-content-between">
                            <div class="h4 mx-4"><b>{{ $loop->iteration }}: </b> {{ $curso->nombre }}</div> 
                            <div class="ml-4">
                                <button class="btn btn-primary btn-lg"> Ver Evaluaciones </button>
                                <borrar-button c_id="{{ $curso->id }}" c_n="{{ $curso->nombre }}" u_id="{{ $user_id }}" csrf="{{ csrf_token() }}"> </borrar-button> 
                            </div>               
                        </div>
                    @endforeach
                    <sin-cursos ex="{{ $existe }}"> </sin-cursos>
                    <hr>
                </div>
                <div class="card-footer bg-dark text-light">
                    <div class="float-right">
                        <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id]) }}" class="btn btn-secondary"> Agregar Curso </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
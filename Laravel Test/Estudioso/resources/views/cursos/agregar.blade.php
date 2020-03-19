@extends('layouts.app')

@section('title')
    <title> Estudioso | Agregar Curso </title>
    <link rel="icon" href=" {{ asset('img/favicon.png') }}">
@endsection

@section('navbar')
    <li> <a href="{{ route('verCursos', ['user_id' => auth()->user()->id]) }}" class="text-muted mx-4 text-nowrap"> Ver Cursos </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id]) }}" class="text-dark mx-4 text-nowrap"> <u> Agregar Curso </u> </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => 0  ]) }}" class="text-muted mx-4 text-nowrap"> Calendario </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('home') }}" class="text-muted mx-4 text-nowrap"> Menú Principal </a> </li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-8">
            <div class="card rounded-lg border border-light">
                <div class="card-header text-center bg-dark text-light">
                    <span class="h4"> Agregar Curso </span>
                </div>
                    <form action="/cursos/agregar/{{$userid}}/crear" method="POST">
                    @csrf
                    <div class="card-body justify-content-center border border-secondary" style="background-color: #F5F5F5">
                        Introduzca el nombre del curso a agregar.
                        <hr class="bg-secondary">
                        <label for="nombre" class="col-form-label text-md-right"> Nombre del Curso </label>
                        <input id="nombre" type="text" class="col-9 form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" autocomplete="curso" autofocus>
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="card-footer bg-dark text-center"> <input type="submit" value="Continuar" class="btn btn-success"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title')
    <title> Estudioso | Agregar Curso </title>
@endsection

@section('navbar')
    <li> <a href="#" class="text-muted mx-4 text-nowrap"> Ver Cursos </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id]) }}" class="text-dark mx-4 text-nowrap"> Agregar Curso </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="#" class="text-muted mx-4 text-nowrap"> Calendario </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('home') }}" class="text-muted mx-4 text-nowrap"> Menú Principal </a> </li>
@endsection

@section('content')
    <div class="container">
        <h3> Agregar Curso </h3>
    </div>
@endsection
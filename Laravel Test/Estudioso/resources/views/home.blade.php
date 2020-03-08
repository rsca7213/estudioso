@extends('layouts.app')

@section('title')
    <title> Estudioso | Menú Principal </title>
@endsection

@section('navbar')
    <li> <a href="#" class="text-muted mx-4 text-nowrap"> Ver Cursos </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id ]) }}" class="text-muted mx-4 text-nowrap"> Agregar Curso </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="#" class="text-muted mx-4 text-nowrap"> Calendario </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('home') }}" class="text-dark mx-4 text-nowrap"> Menú Principal </a> </li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card rounded-lg border border-light">
            <div class="card-header text-center bg-dark text-light">
                <span class="h4"> Evaluaciones Proximas </span>
            </div>
            <div class="card-body" style="background-color: #F5F5F5">
                <table class="table table-striped table-hover border border-muted"> 
                    <thead class="thead-dark"> 
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Curso </th>
                            <th scope="col"> Evaluación </th>
                            <th scope="col"> Fecha </th>
                            <th scope="col" class="hidden d-none d-lg-block"> Ponderación </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="transform: rotate(0);">
                            <th scope="row"> <a href="#" class="stretched-link text-dark"> 1 </a> </th>
                            <td> Calculo IV </td>
                            <td> Parcial #3 </td>
                            <td> 15/05/2015 </td>
                            <td class="hidden d-none d-lg-block"> 25% (5 puntos) </td>
                        </tr>
                        <tr style="transform: rotate(0);">
                            <th scope="row"> <a href="#" class="stretched-link text-dark"> 2 </a> </th>
                            <td> Programación II </td>
                            <td> Parcial #1 </td>
                            <td> 11/02/2017 </td>
                            <td class="hidden d-none d-lg-block"> 50% (10 puntos) </td>
                        </tr>
                        <tr style="transform: rotate(0);">
                            <th scope="row"> <a href="#" class="stretched-link text-dark"> 3 </a> </th>
                            <td> Ecologia, Ambiente y Sustentabilidad </td>
                            <td> Trabajo #2 </td>
                            <td> 16/06/2016 </td>
                            <td class="hidden d-none d-lg-block"> 10% (2 puntos) </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

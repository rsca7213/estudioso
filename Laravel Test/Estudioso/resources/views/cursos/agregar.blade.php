@extends('layouts.app')

@section('title')
    <title> Estudioso | Agregar Curso </title>
    <link rel="icon" href=" {{ asset('img/favicon.png') }}">
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
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-8">
                <div class="card rounded-lg border border-light">
                    <div class="card-header text-center bg-dark text-light">
                        <span class="h4"> Agregar Curso </span>
                    </div>
                    <form action="" method="GET">
                        @csrf
                        <div class="card-body justify-content-center border border-secondary" style="background-color: #F5F5F5">
                            <label for="curso" class="col-form-label text-md-right"> Nombre del Curso </label>
                            <input id="curso" type="text" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{ old('curso') }}" required autocomplete="curso" autofocus>
                            <hr class="bg-secondary">
                            <table class="table table-striped table-hover border border-secondary"> 
                                <h4 class="text-center"> Evaluaciones del Curso </h4>
                                <thead class="thead-dark"> 
                                    <tr>
                                        <th scope="col"> # </th>
                                        <th scope="col"> Nombre </th>
                                        <th scope="col" class="text-center"> Fecha </th>
                                        <th scope="col" class="text-center"> Porcentaje </th>
                                        <th scope="col" class="text-center"> Acción </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tabla-evaluaciones> </tabla-evaluaciones>
                                    <tr>
                                        <th scope="row"> 1 </th>
                                        <td> Parcial #1 </td>
                                        <td class="text-center"> 15/05/2015 </td>
                                        <td class="text-center"> 30% </td>
                                        <td class="text-center"> 
                                            <span> <img src="{{ asset('img/icons/edit.svg') }}" alt="editar" style="width: 1.4rem;"> </span>
                                            <span> <img src="{{ asset('img/icons/trash.svg') }}" alt="borrar" style="width: 1.4rem;"> </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> 2 </th>
                                        <td> Trabajo #3 </td>
                                        <td class="text-center"> 19/05/2016 </td>
                                        <td class="text-center"> 15% </td>
                                        <td class="text-center"> 
                                            <span> <img src="{{ asset('img/icons/edit.svg') }}" alt="editar" style="width: 1.4rem;"> </span>
                                            <span> <img src="{{ asset('img/icons/trash.svg') }}" alt="borrar" style="width: 1.4rem;"> </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> 3 </th>
                                        <td> Proyecto </td>
                                        <td class="text-center"> 28/07/2015 </td>
                                        <td class="text-center"> 25% </td>
                                        <td class="text-center"> 
                                            <span> <img src="{{ asset('img/icons/edit.svg') }}" alt="editar" style="width: 1.4rem;"> </span>
                                            <span> <img src="{{ asset('img/icons/trash.svg') }}" alt="borrar" style="width: 1.4rem;"> </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="">
                                <agregar-evaluacion> </agregar-evaluacion> 
                            </div>
                        </div>
                        <div class="card-footer bg-dark text-center"> <input type="submit" value="Agregar Curso" class="btn btn-success"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
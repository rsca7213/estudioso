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
                        <span class="h4"> {{ $curso->nombre }}: Evaluaciones </span>
                    </div>
                        <div class="card-body justify-content-center border border-secondary" style="background-color: #F5F5F5">
                            <table class="table table-striped table-hover border border-secondary"> 
                                <hr class="bg-secondary">
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
                                    <span style="visibility: hidden;"> {{ $porc = 0 }} </span>
                                    <span style="visibility: hidden;"> {{ $ciclos = 0 }} </span>
                                    @foreach ($curso->evaluacions()->where('curso_id', $curso->id)->get() as $evaluacion)
                                    <tr>
                                        <th scope="row"> {{ $loop->iteration }} </th>
                                        <td> {{ $evaluacion->nombre }} </td>
                                        <td class="text-center"> {{ date('d/m/Y', strtotime($evaluacion->fecha)) }} </td>
                                        <td class="text-center"> {{ $evaluacion->porcentaje }}% </td>
                                        <td class="text-center"> 
                                            <editar-evaluacion evid="{{$evaluacion->id}}" evn="{{$evaluacion->nombre}}" 
                                                evf="{{$evaluacion->fecha}}" evp="{{$evaluacion->porcentaje}}" 
                                                csrf="{{csrf_token()}}" userid="{{ $user_id }}" cursoid="{{ $curso->id }}"> </editar-evaluacion>
                                            <borrar-evaluacion evid="{{$evaluacion->id}}" evn="{{$evaluacion->nombre}}" 
                                            evf="{{date('d/m/Y', strtotime($evaluacion->fecha))}}" evp="{{$evaluacion->porcentaje}}" 
                                            csrf="{{csrf_token()}}" userid="{{ $user_id }}" cursoid="{{ $curso->id }}"> </borrar-evaluacion>
                                        </td>
                                    </tr>
                                    <span style="visibility: hidden;"> {{ $porc += $evaluacion->porcentaje }} </span>
                                    <span style="visibility: hidden;"> {{ $ciclos = 1 }} </span>
                                     @endforeach
                                </tbody>
                            </table>
                            <tabla-vacia ciclos="{{ $ciclos }}"></tabla-vacia>
                            <hr class="bg-secondary">
                            <agregar-evaluacion porc="{{ $porc }}" csrf="{{csrf_token()}}" userid="{{ $user_id }}" curso="{{ $curso->id }}"> </agregar-evaluacion> 
                        </div>
                        <div class="card-footer bg-dark text-center">
                            <a href="{{ route('home') }}" class="btn btn-success"> Finalizar </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
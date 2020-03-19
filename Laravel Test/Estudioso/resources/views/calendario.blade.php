@extends('layouts.app')

@section('title')
    <title> Estudioso | Calendario </title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
@endsection

@section('navbar')
    <li> <a href="{{ route('verCursos', ['user_id' => auth()->user()->id]) }}" class="text-muted mx-4 text-nowrap"> Ver Cursos </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id ]) }}" class="text-muted mx-4 text-nowrap"> Agregar Curso </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => 0 ]) }}" class="text-dark mx-4 text-nowrap"> <u> Calendario </u> </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('home') }}" class="text-muted mx-4 text-nowrap"> Menú Principal </a> </li>
@endsection

@section('content')
    <div class="container">
        <table class="table table-bordered"> 
            <thead class="thead-dark"> 
                <tr>
                    @for ($i = 0; $i < 5 ; $i++)
                        <th scope="col" class="text-center"> {{ $dias[$i]['diaSemana'] }} <br> {{ $dias[$i]['dia']}} </th>
                    @endfor
                </tr>
            </thead>
            <tbody> 
                <tr>
                    @for ($i = 0; $i < 5 ; $i++)
                        <th class="bg-light align-middle" style="height: 210px; max-width: 150px;"> 
                            <ul>
                                @foreach ($dias[$i]['evs'] as $ev)
                                    <li> {{$ev['nombre']}}<br>{{$ev['curso']}}</li>
                                @endforeach
                            </ul>
                            @if (!$dias[$i]['existe'])
                                <p class="text-center"> Sin <br> Evaluaciones </p>
                            @endif
                        </th>
                    @endfor
                </tr>
            </tbody>
            <thead class="thead-dark"> 
                <tr>
                    @for ($i = 5; $i < 10 ; $i++)
                        <th scope="col" class="text-center"> {{ $dias[$i]['diaSemana'] }} <br> {{ $dias[$i]['dia']}} </th>
                    @endfor
                </tr>
            </thead>
            <tbody> 
                <tr>
                    @for ($i = 5; $i < 10 ; $i++)
                        <th class="bg-light align-middle" style="height: 210px; max-width: 50px;">
                            <ul>
                                @foreach ($dias[$i]['evs'] as $ev)
                                    <li> {{$ev['nombre']}}<br>{{$ev['curso']}}</li>
                                @endforeach
                            </ul>
                            @if (!$dias[$i]['existe'])
                                <p class="text-center"> Sin <br> Evaluaciones </p>
                            @endif
                        </th>
                    @endfor
                </tr>
            </tbody>
        </table>
        <div class="row d-flex justify-content-center">
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag-1 ]) }}" class="btn btn-dark mx-2">Anterior</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag-4 ]) }}" class="btn btn-info mx-1"> {{ $pag-4 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag-3 ]) }}" class="btn btn-info mx-1"> {{ $pag-3 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag-2 ]) }}" class="btn btn-info mx-1"> {{ $pag-2 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag-1 ]) }}" class="btn btn-info mx-1"> {{ $pag-1 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag ]) }}" class="btn btn-secondary mx-1"> {{ $pag }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag+1 ]) }}" class="btn btn-info mx-1"> {{ $pag+1 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag+2 ]) }}" class="btn btn-info mx-1"> {{ $pag+2 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag+3 ]) }}" class="btn btn-info mx-1"> {{ $pag+3 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag+4 ]) }}" class="btn btn-info mx-1"> {{ $pag+4 }}</a>
            <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => $pag+1 ]) }}" class="btn btn-dark mx-2">Siguiente</a>
        </div>
    </div>
@endsection
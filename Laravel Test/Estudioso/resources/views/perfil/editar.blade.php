@extends('layouts.app')

@section('title')
    <title> Estudioso | Editar Perfil </title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
@endsection

@section('navbar')
    <li> <a href="{{ route('verCursos', ['user_id' => auth()->user()->id]) }}" class="text-muted mx-4 text-nowrap"> Ver Cursos </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('agregarCurso', ['id'=> auth()->user()->id ]) }}" class="text-muted mx-4 text-nowrap"> Agregar Curso </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('calendario', ['user_id' => auth()->user()->id, 'pag' => 0  ]) }}" class="text-muted mx-4 text-nowrap"> Calendario </a> </li>
    <span class="text-muted hidden d-none d-lg-block"> | </span>
    <li> <a href="{{ route('home') }}" class="text-muted mx-4 text-nowrap"> Menú Principal </a> </li>
@endsection

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-7">
            <div class="card rounded-lg border border-light">
                <div class="card-header text-center bg-dark text-light">
                    <span class="h4"> Editar Perfil </span>
                </div>
                <form action="/perfil/{{$user->id}}/editar" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <div class="card-body border border-secondary" style="background-color: #F5F5F5">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre y Apellido') }}</label>
    
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>
    
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Actual') }}</label>
    
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordNew" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Nueva') }}</label>
    
                            <div class="col-md-6">
                                <input id="passwordNew" type="password" class="form-control @error('passwordNew') is-invalid @enderror" name="passwordNew" required autocomplete="new-password">
    
                                @error('passwordNew')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer bg-dark text-light text-center">
                        <input type="submit" value="Actualizar Perfil" class="btn btn-primary">
                        <b> <span class=" ml-2 text-success"> {{ $s }} </span> </b>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
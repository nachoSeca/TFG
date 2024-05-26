@extends('adminlte::page')

@section('title', 'Editar perfil de administrador')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">
        {{-- Mostramos mensaje de que se ingreso bien --}}
        @if (Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif

        {{-- Mostramos mensaje de que algo salio mal --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @include('profile.partials.update-profile-information-form')

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/users/user.css">
    <link rel="stylesheet" type="text/css" href="/css/student.css">
    <link rel="stylesheet" href="css/tutors/cardTutor.css">


@stop

@section('js')
   
@stop

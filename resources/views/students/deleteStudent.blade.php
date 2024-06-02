@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">

        <h1>Eliminar estudiante</h1>

        <p>¿Estás seguro de que quieres eliminar al estudiante <strong>{{ $student->name }}</strong>?</p>

        <form method="POST" action="{{ route('students.destroy', $student->id) }}">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    @stop

    @section('css')
        <link rel="stylesheet" type="text/css" href="/css/users/user.css">
        <link rel="stylesheet" type="text/css" href="/css/tracking.css">


    @stop

    @section('js')

    @stop

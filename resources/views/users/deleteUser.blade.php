
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">

        <h1>Eliminar usuario</h1>

        <p>¿Estás seguro de que quieres eliminar al usuario/a <strong>{{ $user->name }}</strong>?</p>
    
        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
            @method('DELETE')
            @csrf
    
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    @stop

    @section('css')



    @stop

    @section('js')

    @stop

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">

        <h1>Editar Curso</h1>
        <div class="row">
            <div class="col-12">
                <div class="button_return">
                    @can('courses.index')
                        <a href="{{ route('courses.index') }}" class="form-btn">
                            <img src="/image/volver.png" alt="" class="icons">
                            Volver
                        </a>
                    @endcan
                    @can('courses.show')
                        <a href="{{ route('courses.show', $course->id) }}" class="form-btn">
                            <img src="/image/volver.png" alt="" class="icons">
                            Volver
                        </a>
                    @endcan
                </div>
            </div>

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
            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Nombre del curso:<span class="required">*</span></strong>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                        value="{{ $course->nombre }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="form-btn">Actualizar curso</button>

                </div>
                {{-- </div> --}}
            </form>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" type="text/css" href="/css/users/user.css">
        <link rel="stylesheet" type="text/css" href="/css/course.css">


    @stop

    @section('js')

    @stop

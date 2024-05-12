@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
<div class="container">

    <h1>Editar tutor</h1>
    <div class="row">
        @can('total')
        <div class="col-12">
            <div class="button_return">
                <a href="{{ route('tutors.index') }}" class="form-btn">
                    <img src="/image/volver.png" alt="" class="icons">
                    Volver
                </a>
            </div>
        </div>
        @endcan
        @can('tutors.show')
        <div class="col-12">
            <div class="button_return">
                <a href="{{ route('tutors.show', $tutor->id) }}" class="form-btn">
                    <img src="/image/volver.png" alt="" class="icons">
                    Volver
                </a>
            </div>
        </div>
        @endcan
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
        <form action="{{ route('tutors.update', $tutor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Nombre:<span class="required">*</span></strong>
                                <input type="text" name="name" class="form-control" placeholder="Nombre"
                                    value="{{ $tutor->name }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Email:<span class="required">*</span></strong>
                                <input value="{{ $tutor->email }}" type="email" name="email" class="form-control"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Teléfono móvil:<span class="required">*</span></strong>
                                <input value="{{ $tutor->telefono_movil }}" type="text" name="telefono_movil"
                                    class="form-control" placeholder="Teléfono móvil">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Apellidos:<span class="required">*</span></strong>
                                <input value="{{ $tutor->apellidos }}" type="text" name="apellidos"
                                    class="form-control" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Usuario:</strong>
                                <input value="{{ $tutor->user->id }}" type="hidden" name="user_id">
                                <input value="{{ $tutor->user->name }}" type="text" class="form-control" placeholder="user_id" readonly>
                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <label for="user_id"><strong>Usuario:</strong><span class="required">*</span></label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($users as $user)
                                        @if ($user->role_id == 2)
                                            <option value="{{ $user->id }}"
                                                {{ $tutor->user_id == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        
                        
                        


                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                <button type="submit" class="form-btn">Actualizar tutor</button>
            </div>
    </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="css/users/user.css">
    <link rel="stylesheet" type="text/css" href="/css/student.css">


@stop

@section('js')

@stop

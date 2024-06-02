@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Nuevo Usuario</h1> --}}
@stop

@section('content')
<div class="container">

    <h1>Nuevo estudiante</h1>
    <div class="row">
        <div class="col-12">
            <div class="button_return">
                <a href="{{ route('students.index') }}" class="form-btn">
                    <img src="/image/volver.png" alt="" class="icons">
                    Volver
                </a>
            </div>
        </div>

        {{-- Mostramos mensaje de que algo salio mal --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>Vaya!</strong> Algo fue mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Nombre:<span class="required">*</span></strong>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                    value="{{ old('nombre') }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Email:<span class="required">*</span></strong>
                                <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Teléfono móvil:<span class="required">*</span></strong>
                                <input value="{{ old('telefono_movil') }}" type="text" name="telefono_movil"
                                    class="form-control" placeholder="Teléfono móvil">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Nota media:</strong>
                                <input value="{{ old('nota_media') }}" type="number" name="nota_media"
                                    class="form-control" placeholder="Nota media">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Subir CV:</strong>
                                <input value="{{ old('subir_cv') }}" type="file" name="subir_cv"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Fecha inicio prácticas:</strong>
                                <input value="{{ old('fecha_inicio_fct') }}" type="date" name="fecha_inicio_fct"
                                    class="form-control" placeholder="Fecha inicio FCT">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <label for="tutor_id"><strong>Tutor:</strong></label>
                                <select name="tutor_id" id="tutor_id" class="form-control">
                                    <option value="">Seleccionar...</option>
                                    <!-- Opción vacía para "selección" -->
                                    @foreach ($tutors as $tutor)
                                        <option value="{{ $tutor->id }}"
                                            {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}>
                                            {{ $tutor->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Apellidos:<span class="required">*</span></strong>
                                <input value="{{ old('apellidos') }}" type="text" name="apellidos"
                                    class="form-control" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <label for="user_id"><strong>Usuario:</strong><span class="required">*</span></label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Seleccionar...</option>
                                    <!-- Opción vacía para "selección" -->
                                    @foreach ($users as $user)
                                        @if ($user->role_id == 3)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <label for="course_id"><strong>Curso:</strong><span class="required">*</span></label>
                                <select name="course_id" id="course_id" class="form-control">
                                    <option value="">Seleccionar...</option>
                                    <!-- Opción vacía para "selección" -->
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                            {{ $course->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <label for="company_id"><strong>Empresa de prácticas:</strong></label>
                                <select name="company_id" id="company_id" class="form-control">
                                    <option value="">Seleccionar...</option>
                                    <!-- Opción vacía para "selección" -->
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                            {{ $company->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Dirección prácticas:</strong>
                                <input value="{{ old('direccion_practicas') }}" type="text"
                                    name="direccion_practicas" class="form-control"
                                    placeholder="Dirección prácticas">
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Fecha fin prácticas:</strong>
                                <input value="{{ old('fecha_fin_fct') }}" type="date" name="fecha_inicio_fct"
                                    class="form-control" placeholder="Fecha fin FCT">
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                <button type="submit" class="form-btn">Añadir estudiante</button>
            </div>
    </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/users/user.css">
    <link rel="stylesheet" type="text/css" href="/css/tutors/tutor.css">
    <link rel="stylesheet" type="text/css" href="/css/tutors/createTutor.css">

@stop

@section('js')

    </script>
@stop

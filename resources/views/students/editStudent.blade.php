@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">

        <h1>Editar estudiante</h1>
        <div class="row">
            <div class="col-12">
                <div class="button_return">
                    @can('students.index')
                        <a href="{{ route('students.index') }}" class="form-btn">
                            <img src="/image/volver.png" alt="" class="icons">
                            Volver
                        </a>
                    @endcan
                    @can('students.show')
                        <a href="{{ route('students.show', $student->id) }}" class="form-btn">
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
            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Nombre:<span class="required">*</span></strong>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre"
                                        value="{{ $student->name }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Email:<span class="required">*</span></strong>
                                    <input value="{{ $student->email }}" type="email" name="email" class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Teléfono móvil:<span class="required">*</span></strong>
                                    <input value="{{ $student->telefono_movil }}" type="text" name="telefono_movil"
                                        class="form-control" placeholder="Teléfono móvil">
                                </div>
                            </div>
                            @can('students.index')
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                    <div class="form-group">
                                        <strong>Nota media:</strong>
                                        <input value="{{ $student->nota_media }}" type="number" name="nota_media"
                                            class="form-control" placeholder="Nota media">
                                    </div>
                                </div>
                            @endcan
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Subir CV:</strong>
                                    <input value="{{ $student->subir_cv }}" type="file" name="subir_cv"
                                        class="form-control">
                                </div>
                            </div>
                            @can('students.index')
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                    <div class="form-group">
                                        <strong>Fecha inicio prácticas:</strong>
                                        <input value="{{ $student->fecha_inicio_fct }}" type="date" name="fecha_inicio_fct"
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
                                                    {{ old('tutor_id', $student->tutor_id) == $tutor->id ? 'selected' : '' }}>
                                                    {{ $tutor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endcan


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Apellidos:<span class="required">*</span></strong>
                                    <input value="{{ $student->apellidos }}" type="text" name="apellidos"
                                        class="form-control" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Usuario:</strong>
                                    <input value="{{ $student->user->name }}" type="text" name="user_id"
                                        class="form-control" placeholder="user_id" disabled>
                                </div>
                            </div>
                            @can('students.index')
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                    <div class="form-group">
                                        <strong>Curso:</strong><span class="required">*</span>
                                        <select name="course_id" id="course_id" class="form-control">
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    {{ old('course_id', $student->course->id) == $course->id ? 'selected' : '' }}>
                                                    {{ $course->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                    <div class="form-group">
                                        <strong>Empresa de prácticas:</strong>
                                        <select name="company_id" id="company_id" class="form-control">
                                            <option value="">Seleccionar...</option>
                                            <!-- Opción vacía para "selección" -->
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ old('company_id', $student->company_id) == $company->id ? 'selected' : '' }}>
                                                    {{ $company->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                    <div class="form-group">
                                        <strong>Dirección prácticas:</strong>
                                        <input value="{{ $student->direccion_practicas }}" type="text"
                                            name="direccion_practicas" class="form-control"
                                            placeholder="Dirección prácticas">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                    <div class="form-group">
                                        <strong>Fecha fin prácticas:</strong>
                                        <input value="{{ $student->fecha_fin_fct }}" type="date" name="fecha_fin_fct"
                                            class="form-control" placeholder="Fecha fin FCT">
                                    </div>
                                </div>
                            @endcan
                            @can('students.show')
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Avatar actual:</strong>
                                        @if (filter_var($avatar, FILTER_VALIDATE_URL))
                                            <!-- Si el avatar es una URL, asumimos que es un usuario de Google -->
                                            <img src="{{ $avatar }}" alt="Avatar del usuario">
                                        @else
                                            <!-- Si no es una URL, asumimos que es un usuario normal y la imagen está en el storage -->
                                            <img src="{{ asset('storage/avatar/' . $avatar) }}" alt="Avatar del usuario">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                    <div class="form-group">
                                        <strong>Avatar:</strong>
                                        <input value="{{ old('avatar') }}" type="file" name="avatar"
                                            class="form-control" id="formFile">
                                    </div>
                                </div>
                            @endcan


                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                    <button type="submit" class="form-btn">Actualizar estudiante</button>

                </div>
                {{-- </div> --}}
            </form>
        </div>
    @stop

    @section('css')
    <link rel="stylesheet" type="text/css" href="/css/users/user.css">
        <link rel="stylesheet" type="text/css" href="/css/student.css">


    @stop

    @section('js')

    @stop

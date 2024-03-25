@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/student.css">
@endsection

@section('title', 'Editar estudiante')

@section('content')
    <div class="container">

        <h1>Editar estudiante</h1>
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
                    <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                value="{{ $student->nombre }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            <input value="{{ $student->apellidos }}" type="text" name="apellidos" class="form-control"
                                placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input value="{{ $student->email }}" type="email" name="email" class="form-control"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Teléfono móvil:</strong>
                            <input value="{{ $student->telefono_movil }}" type="text" name="telefono_movil"
                                class="form-control" placeholder="Teléfono móvil">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <label for="course_id">Curso:</label>
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
                            <strong>Nota media:</strong>
                            <input value="{{ $student->nota_media }}" type="number" name="nota_media" class="form-control"
                                placeholder="Nota media">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <label for="company_id">Empresa de prácticas:</label>
                            <select name="company_id" id="company_id" class="form-control">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id', $student->company_id) == $company->id ? 'selected' : '' }}>
                                        {{ $company->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Subir CV:</strong>
                            <input value="{{ $student->subir_cv }}" type="file" name="subir_cv" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Fecha inicio prácticas:</strong>
                            <input value="{{ $student->fecha_inicio_fct }}" type="date" name="fecha_inicio_fct"
                                class="form-control" placeholder="Fecha inicio FCT">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Fecha fin prácticas:</strong>
                            <input value="{{ $student->fecha_fin_fct }}" type="date" name="fecha_inicio_fct"
                                class="form-control" placeholder="Fecha fin FCT">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Dirección prácticas:</strong>
                            <input value="{{ $student->direccion_practicas }}" type="text" name="direccion_practicas"
                                class="form-control" placeholder="Dirección prácticas">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <label for="tutor_id">Tutor:</label>
                            <select name="tutor_id" id="tutor_id" class="form-control">
                                @foreach ($tutors as $tutor)
                                    <option value="{{ $tutor->id }}" {{ old('tutor_id', $student->tutor_id) == $tutor->id ? 'selected' : '' }}>
                                        {{ $tutor->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <button type="submit" class="form-btn">Actualizar estudiante</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')

@endsection

@section('scripts')

@endsection
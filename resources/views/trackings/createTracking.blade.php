@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Nuevo Usuario</h1> --}}
@stop

@section('content')
    <div class="container">

        <h1>Nuevo seguimiento</h1>
        <div class="row">
            <div class="col-12">
                <div class="button_return">
                    <a href="{{ route('trackings.index') }}" class="form-btn">
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
            <form action="{{ route('trackings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Fecha seguimiento:<span class="required">*</span></strong>
                                    <input type="date" name="fecha_seguimiento" class="form-control" placeholder="Nombre"
                                        value="{{ old('fecha_seguimiento') }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>PDF seguimiento:</strong>
                                    <input value="{{ old('pdf_seguimiento') }}" type="file" name="pdf_seguimiento"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Observaciones:<span class="required">*</span></strong>
                                    <textarea name="observaciones" class="form-control" placeholder="Observaciones">{{ old('observaciones') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="student_id"><strong>Estudiante:</strong><span
                                            class="required">*</span></label>
                                    <select name="student_id" id="student_id" class="form-control">
                                        <option value="">Seleccionar...</option>
                                        <!-- Opción vacía para "selección" -->
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}"
                                                {{ old('tutor_id') == $student->id ? 'selected' : '' }}>
                                                {{ $student->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="student_id"><strong>Tutor:</strong><span class="required">*</span></label>
                                    <select name="tutor_id" id="student_id" class="form-control">
                                        <option value="">Seleccionar...</option>
                                        <!-- Opción vacía para "selección" -->
                                        @foreach ($tutors as $tutor)
                                            <option value="{{ $tutor->id }}"
                                                {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}>
                                                {{ $tutor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                    <button type="submit" class="form-btn">Añadir seguimiento</button>
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

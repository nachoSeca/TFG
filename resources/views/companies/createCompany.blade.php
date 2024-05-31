@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Nuevo Usuario</h1> --}}
@stop

@section('content')
<div class="container">

    <h1>Nueva empresa</h1>
        <div class="row">
            <div class="col-12">
                <div class="button_return">
                    <a href="{{ route('companies.index') }}" class="form-btn">
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
            <form id="companieForm" action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <strong>Código Postal:<span class="required">*</span></strong>
                                    <input value="{{ old('codigo_postal') }}" type="text" name="codigo_postal" class="form-control" placeholder="Código postal">
                                    {{-- <small class="form-text text-muted">El código postal debe tener exactamente 5 dígitos.</small> --}}
                                    <span class="error-message" id="codigo_postal_error"></span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Localidad:</strong>
                                    <input value="{{ old('localidad') }}" type="text" name="localidad" class="form-control"
                                        placeholder="Localidad">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Página web:</strong>
                                    <input value="{{ old('web') }}" type="text" name="web" class="form-control"
                                        placeholder="Página web">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Email contacto:<span class="required">*</span></strong>
                                    <input value="{{ old('email_contacto') }}" type="email" name="email_contacto" class="form-control" placeholder="Email Contacto">
                                    <span class="error-message" id="email_contacto_error"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Teléfono fijo:</strong>
                                    <input value="{{ old('telefono_fijo') }}" type="tel" name="telefono_fijo" class="form-control" placeholder="Teléfono fijo">
                                    <span class="error-message" id="telefono_fijo_error"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Fecha último contacto:</strong>
                                    <input value="{{ old('fecha_ultimo_contacto') }}" type="date" name="fecha_ultimo_contacto" class="form-control"
                                        placeholder="Fecha último contacto">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Observaciones:</strong>
                                    <input value="{{ old('observaciones') }}" type="text" name="observaciones" class="form-control"
                                        placeholder="Observaciones">
                                </div>
                            </div>
                            



                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Dirección:</strong>
                                    <input value="{{ old('direccion') }}" type="text" name="direccion" class="form-control"
                                        placeholder="Dirección">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Municipio:<span class="required">*</span></strong>
                                    <input value="{{ old('municipio') }}" type="text" name="municipio"
                                        class="form-control" placeholder="Municipio">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Provincia:<span class="required">*</span></strong>
                                    <input value="{{ old('provincia') }}" type="text" name="provincia" class="form-control"
                                        placeholder="Provincia">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Nombre contacto:<span class="required">*</span></strong>
                                    <input value="{{ old('nombre_contacto') }}" type="text" name="nombre_contacto" class="form-control"
                                        placeholder="Nombre Contacto">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Apellido contacto:<span class="required">*</span></strong>
                                    <input value="{{ old('apellido_contacto') }}" type="text" name="apellido_contacto" class="form-control"
                                        placeholder="Apellido Contacto">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Teléfono móvil:<span class="required">*</span></strong>
                                    <input value="{{ old('telefono_movil') }}" type="tel" name="telefono_movil" class="form-control" placeholder="Teléfono móvil">
                                    <span class="error-message" id="telefono_movil_error"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Plazas disponibles:<span class="required">*</span></strong>
                                    <input value="{{ old('plazas_disponibles') }}" type="number" name="plazas_disponibles" class="form-control" placeholder="Plazas disponibles">
                                    <span class="error-message" id="plazas_disponibles_error"></span>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Busca alumnos de:</strong><span class="required">*</span>
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



                        </div>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                    <button type="submit" class="form-btn">Añadir empresa</button>
                </div>
        </div>
        </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/users/user.css">
    <link rel="stylesheet" href="/css/companies/company.css">

    <link rel="stylesheet" type="text/css" href="/css/tutors/tutor.css">
    <link rel="stylesheet" type="text/css" href="/css/tutors/createTutor.css">

@stop

@section('js')

    <script src="/js/companies/createCompany.js"></script>
@stop

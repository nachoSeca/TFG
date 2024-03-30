@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/companies/company.css">
    <link rel="stylesheet" type="text/css" href="/css/tutors/createTutor.css">
@endsection

@section('title', 'Editar empresa')

@section('content')
    <div class="container mt-5">

        <h1>Editar empresa</h1>
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
                    <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('companies.update', $company->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Nombre:<span class="required">*</span></strong>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                        value="{{ $company->nombre }}">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Código Postal:<span class="required">*</span></strong>
                                    <input value="{{ $company->codigo_postal }}" type="text" name="codigo_postal"
                                        class="form-control" placeholder="Código postal">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Localidad:</strong>
                                    <input value="{{ $company->localidad }}" type="text" name="localidad"
                                        class="form-control" placeholder="Localidad">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Página web:</strong>
                                    <input value="{{ $company->web }}" type="text" name="web" class="form-control"
                                        placeholder="Página web">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Email contacto:<span class="required">*</span></strong>
                                    <input value="{{ $company->email_contacto }}" type="email" name="email_contacto"
                                        class="form-control" placeholder="Email Contacto">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Teléfono fijo:</strong>
                                    <input value="{{ $company->telefono_fijo }}" type="tel" name="telefono_fijo"
                                        class="form-control" placeholder="Teléfono fijo">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Fecha último contacto:</strong>
                                    <input value="{{ $company->fecha_ultimo_contacto }}" type="date"
                                        name="fecha_ultimo_contacto" class="form-control"
                                        placeholder="Fecha último contacto">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Observaciones:</strong>
                                    <input value="{{ $company->observaciones }}" type="text" name="observaciones"
                                        class="form-control" placeholder="Observaciones">
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Dirección:</strong>
                                    <input value="{{ $company->direccion }}" type="text" name="direccion"
                                        class="form-control" placeholder="Dirección">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Municipio:<span class="required">*</span></strong>
                                    <input value="{{ $company->municipio }}" type="text" name="municipio"
                                        class="form-control" placeholder="Municipio">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Provincia:<span class="required">*</span></strong>
                                    <input value="{{ $company->provincia }}" type="text" name="provincia"
                                        class="form-control" placeholder="Provincia">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Nombre contacto:<span class="required">*</span></strong>
                                    <input value="{{ $company->nombre_contacto }}" type="text" name="nombre_contacto"
                                        class="form-control" placeholder="Nombre Contacto">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Apellido contacto:<span class="required">*</span></strong>
                                    <input value="{{ $company->apellido_contacto }}" type="text"
                                        name="apellido_contacto" class="form-control" placeholder="Apellido Contacto">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Teléfono móvil:<span class="required">*</span></strong>
                                    <input value="{{ $company->telefono_movil }}" type="tel" name="telefono_movil"
                                        class="form-control" placeholder="Teléfono móvil">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Plazas disponibles:<span class="required">*</span></strong>
                                    <input value="{{ $company->plazas_disponibles }}" type="number"
                                        name="plazas_disponibles" class="form-control" placeholder="Plazas disponibles">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="course_id"><strong>Alumnos de:</strong><span
                                            class="required">*</span></label>
                                    <select name="course_id" id="course_id" class="form-control">
                                        <option value="">Seleccionar...</option>
                                        <!-- Opción vacía para "selección" -->
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $company->course_id == $course->id ? 'selected' : '' }}>
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
                    <button type="submit" class="form-btn">Modificar empresa</button>
                </div>
        </div>
        </form>
    </div>


@endsection

@section('footer')

@endsection

@section('scripts')

@endsection

@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/tutors/tutor.css">
    <link rel="stylesheet" type="text/css" href="/css/tutors/createTutor.css">
@endsection

@section('title', 'Nuevo estudiante')

@section('content')
    <div class="container mt-5">

        <h1>Nuevo tutor</h1>
        <div class="row">
            <div class="col-12">
                <div class="button_return">
                    <a href="{{ route('tutors.index') }}" class="form-btn">
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
            <form action="{{ route('tutors.store') }}" method="POST" enctype="multipart/form-data">
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
                                            @if ($user->role_id == 2)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                    <button type="submit" class="form-btn">Añadir tutor</button>
                </div>
        </div>
        </form>
    </div>


@endsection

@section('footer')

@endsection

@section('scripts')

@endsection

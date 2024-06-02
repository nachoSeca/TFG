@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Nuevo Usuario</h1> --}}
@stop

@section('content')
<div class="container">
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
                <strong>Vaya!</strong> Algo fue mal..<br><br>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/users/user.css">
    <link rel="stylesheet" type="text/css" href="/css/tutors/tutor.css">
    <link rel="stylesheet" type="text/css" href="/css/tutors/createTutor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>
    <script src='build/pdfmake.min.js'></script> {{-- <script src="//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json"></script> --}}
    <script>
 
    </script>
@stop

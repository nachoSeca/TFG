@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Nuevo usuario</h1>
        <div class="row">
            @can('total')
                <div class="col-12">
                    <div class="button_return">
                        <a href="{{ route('users.index') }}" class="form-btn">
                            <img src="/image/volver.png" alt="" class="icons">
                            Volver
                        </a>
                    </div>
                </div>
            @endcan
            @can('tutors.show')
                <div class="col-12">
                    <div class="button_return">
                        <a href="{{ route('students.index') }}" class="form-btn">
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
            <form id="userForm" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Nombre:<span class="required">*</span></strong>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre"
                                        value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Email:<span class="required">*</span></strong>
                                    <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                                        placeholder="Email">
                                        <span class="error-message" id="email_error"></span>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Password:<span class="required">*</span></strong>
                                    <input value="{{ old('password') }}" type="password" name="password"
                                        class="form-control" placeholder="Password" id="password">
                                        <span class="error-message" id="password_error"></span>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            onclick="mostrarPass()" id="check">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Mostrar Contraseña
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Avatar:</strong>
                                    <input value="{{ old('avatar') }}" type="file" name="avatar" class="form-control"
                                        placeholder="Avatar">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Rol:<span class="required">*</span></strong>
                                    <div>
                                        @can('total')
                                            <label class="cl-radio" for="admin">
                                                <input type="radio" id="admin" name="roles" value="admin"
                                                    class="cl-radio" {{ request('role') == 'admin' ? 'checked' : '' }}>
                                                <span>Admin</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="cl-radio" for="tutor">
                                                <input type="radio" id="tutor" name="roles" value="tutor"
                                                    class="cl-radio" {{ request('role') == 'tutor' ? 'checked' : '' }}>
                                                <span>Tutor</span>
                                            </label>
                                        </div>
                                    @endcan

                                    <div>
                                        <label class="cl-radio" for="student">
                                            <input type="radio" id="student" name="roles" value="student"
                                                class="cl-radio" {{ request('role') == 'student' ? 'checked' : '' }}>
                                            <span>Student</span>
                                        </label>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                    <button type="submit" class="form-btn">Añadir usuario</button>
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
    <script src="/js/users/createUser.js"></script>
@stop

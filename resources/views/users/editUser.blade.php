@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">

        <h1>Editar usuario</h1>
        <div class="row">
            <div class="col-12">
                <div class="button_return">
                    <a href="{{ route('users.index') }}" class="form-btn">
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
            <form id="userForm" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Nombre:<span class="required">*</span></strong>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre"
                                        value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Email:<span class="required">*</span></strong>
                                    <input value="{{ $user->email }}" type="email" name="email" class="form-control"
                                        placeholder="Email">
                                        <span class="error-message" id="email_error"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Avatar actual:</strong>
                                    @if (filter_var($user->avatar, FILTER_VALIDATE_URL))
                                        <!-- Si el avatar es una URL, asumimos que es un usuario de Google -->
                                        <img src="{{ $user->avatar }}" alt="Avatar del usuario">
                                    @else
                                        <!-- Si no es una URL, asumimos que es un usuario normal y la imagen está en el storage -->
                                        <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="Avatar del usuario">
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Avatar:</strong>
                                    <input value="{{ old('avatar') }}" type="file" name="avatar" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Rol:<span class="required">*</span></strong>
                                    <div>
                                        <label class="cl-radio" for="admin">
                                            <input type="radio" id="admin" name="roles" value="admin"
                                                {{ $user->roles->pluck('name')->first() == 'admin' ? 'checked' : '' }}>
                                            <span>Admin</span>
                                        </label>
                                    </div>

                                    <div>
                                        <label class="cl-radio" for="tutor">
                                            <input type="radio" id="tutor" name="roles" value="tutor"
                                                {{ $user->roles->pluck('name')->first() == 'tutor' ? 'checked' : '' }}>
                                            <span>Tutor</span>
                                        </label>
                                    </div>

                                    <div>
                                        <label class="cl-radio" for="student">
                                            <input type="radio" id="student" name="roles" value="student"
                                                {{ $user->roles->pluck('name')->first() == 'student' ? 'checked' : '' }}>
                                            <span>Student</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                    <button type="submit" class="form-btn">Actualizar usuario</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/users/user.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.min.css">
@stop

@section('js')

    <script src="/js/users/editUser.js"></script>
@stop

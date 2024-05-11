@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Administrador</h1>
@stop

@section('content')
    <p>Gestiona desde aquí toda tu aplicación</p>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{$usersCount}}</h3>
                        <p>Usuarios registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">
                        Ver listado <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    <a href="{{ route('users.create') }}" class="small-box-footer">
                        Añadir usuario <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="small-box bg-gradient-blue">
                    <div class="inner">
                        <h3>{{$studentsCount}}</h3>
                        <p>Estudiantes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <a href="{{ route('students.index') }}" class="small-box-footer">
                        Ver listado <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    <a href="{{ route('students.create') }}" class="small-box-footer">
                        Añadir estudiante <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="small-box bg-gradient-indigo">
                    <div class="inner">
                        <h3>{{$companiesCount}}</h3>
                        <p>Empresas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <a href="{{ route('companies.index') }}" class="small-box-footer">
                        Ver listado <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    <a href="{{ route('companies.create') }}" class="small-box-footer">
                        Añadir empresa <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="small-box bg-gradient-lightblue">
                    <div class="inner">
                        <h3>{{$tutorsCount}}</h3>
                        <p>Tutores</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <a href="{{ route('tutors.index') }}" class="small-box-footer">
                        Ver listado <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    <a href="{{ route('tutors.create') }}" class="small-box-footer">
                        Añadir tutor <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="small-box bg-gradient-teal">
                    <div class="inner">
                        <h3>{{$trackingsCount}}</h3>
                        <p>Seguimientos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <a href="{{ route('trackings.index') }}" class="small-box-footer">
                        Ver listado <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    <a href="{{ route('trackings.create') }}" class="small-box-footer">
                        Añadir seguimiento <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/users/user.css">

@stop

@section('js')
    <script>
    </script>
@stop

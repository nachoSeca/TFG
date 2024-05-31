@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">
        {{-- Mostramos mensaje de que se ingreso bien --}}
        @if (Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif

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
        <div class="team-single">
            <div class="row">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom d-flex flex-column align-items-center ">
                    <div class="team-single-img">
                        {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""> --}}
                        <img src="{{ asset('storage/avatar/' . $avatar) }}" alt="Avatar del usuario" id="avatar">
                    </div><br>
                    <ul class="list-style9 no-margin">
                        <li> <a href="{{ route('students.edit', $student->id) }}" class="form-btn">Modificar información</a>
                        </li>

                    </ul>

                </div>


                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $student->name }} {{ $student->apellidos }}
                        </h4>
                        <hr>

                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-mobile-alt text-purple"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-purple">CV:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if ($student->subir_cv)
                                                <a href="{{ asset('storage/' . $student->subir_cv) }}" target="_blank">Ver
                                                    CV</a>
                                            @else
                                                <p>No se ha subido ningún CV.</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-envelope text-pink"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><a href="javascript:void(0)">{{ $student->email }}</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-graduation-cap text-orange"></i>
                                            <strong class="margin-10px-left text-orange">Teléfono móvil:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{ $student->telefono_movil }}</p>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-gem text-yellow"></i>
                                            <strong class="margin-10px-left text-yellow">Curso:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>
                                                @if ($student->course)
                                                    {{ $student->course->nombre }}
                                                @else
                                                    El alumno no tiene curso asignado
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-file text-lightred"></i>
                                            <strong class="margin-10px-left text-lightred">Empresa de prácticas:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if ($student->company)
                                                <p>{{ $student->company->nombre }}</p>
                                            @else
                                                <p>Sin empresa asignada.</p>
                                            @endif
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-map-marker-alt text-green"></i>
                                            <strong class="margin-10px-left text-green">Dirección de empresa:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if ($student->direccion_practicas)
                                                <p>{{ $student->direccion_practicas }}</p>
                                            @else
                                                <p>Información no disponible.</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-map-marker-alt text-green"></i>
                                            <strong class="margin-10px-left text-green">Tutor asignado:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if ($tutor && $tutor->name)
                                                <p>{{ $tutor->name }}</p>
                                            @else
                                                <p>Sin tutor asignado.</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id="calendar"></div>

                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/users/user.css">
    <link rel="stylesheet" type="text/css" href="/css/student.css">
    <link rel="stylesheet" href="css/student/cardStudent.css">


@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/locales/es.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                firstDay: 1, // Lunes
                locale: 'es', // Español
                events: [{
                        title: 'Prácticas de {{ $student->name }}',
                        start: '{{ $student->fecha_inicio_fct }}', // fecha de inicio en formato 'YYYY-MM-DD'
                        end: '{{ \Carbon\Carbon::parse($student->fecha_fin_fct)->addDay()->format('Y-m-d') }}' // fecha de fin en formato 'YYYY-MM-DD' + 1 día
                    },
                    // puedes agregar más eventos aquí
                ]

            });
            calendar.render();
        });
    </script>
@stop

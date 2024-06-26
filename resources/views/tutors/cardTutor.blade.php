@extends('adminlte::page')

@section('title', 'Información del tutor')

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
                        <li> <a href="{{ route('tutors.edit', $tutor->id) }}" class="form-btn">Modificar información</a>
                        </li>

                    </ul>

                </div>


                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $tutor->name }} {{ $tutor->apellidos }}
                        </h4>
                        <hr>

                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">

                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-envelope text-pink"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><a href="javascript:void(0)">{{ $tutor->email }}</a></p>
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
                                            <p>{{ $tutor->telefono_movil }}</p>
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
    <link rel="stylesheet" href="css/tutors/cardTutor.css">


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
                        title: 'Prácticas de {{ $tutor->name }}',
                        start: '{{ $tutor->fecha_inicio_fct }}', // fecha de inicio en formato 'YYYY-MM-DD'
                        end: '{{ \Carbon\Carbon::parse($tutor->fecha_fin_fct)->addDay()->format('Y-m-d') }}' // fecha de fin en formato 'YYYY-MM-DD' + 1 día
                    },
                    // puedes agregar más eventos aquí
                    @foreach ($trackings as $tracking)
                        {
                            title: 'Seguimiento de {{ $tracking->student->name }}',
                            start: '{{ $tracking->fecha_seguimiento }}', // fecha del seguimiento en formato 'YYYY-MM-DD'
                        },
                    @endforeach
                ]

            });
            calendar.render();
        });
    </script>
@stop

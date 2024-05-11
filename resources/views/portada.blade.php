@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    {{-- Mostramos el nombre del usuario autenticado --}}
    @if (Auth::check())
        <h2>Bienvenido, {{ Auth::user()->name }}!</h2>
    @endif
    {{-- Mostramos mensaje de que se ingreso bien --}}
    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif
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

    <div id="calendar"></div>


@stop

@section('css')



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

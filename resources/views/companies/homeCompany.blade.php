@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Listado de empresas</h1>

        <div class="row">
            <div class="col-12">

                <div>
                    <a href="{{ route('companies.create') }}" class="form-btn">Añadir empresa</a>
                </div>
            </div>
            <br>
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

            <div class="col-12 mt-4 table-responsive">
                
                <table class="table table-striped" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-secondary">
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>C.P.</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Provincia</th>
                            <th>Web</th>
                            <th>Nombre contacto</th>
                            <th>Apellido contacto</th>
                            <th>Email contacto</th>
                            <th>Teléfono fijo</th>
                            <th>Teléfono móvil</th>
                            <th>Fecha último contacto</th>
                            <th>Plazas disponibles</th>
                            <th>Observaciones</th>
                            <th>Alumnos de...</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($companies as $companie)
                            <tr>
                                <td class="fw-bold">{{ $companie->nombre }}</td>
                                <td>{{ $companie->direccion }}</td>
                                <td>{{ $companie->codigo_postal }}</td>
                                <td>{{ $companie->municipio }}</td>
                                <td>{{ $companie->localidad }}</td>
                                <td>{{ $companie->provincia }}</td>
                                <td>{{ $companie->web }}</td>
                                <td>{{ $companie->nombre_contacto }}</td>
                                <td>{{ $companie->apellido_contacto }}</td>
                                <td>{{ $companie->email_contacto }}</td>
                                <td>{{ $companie->telefono_fijo }}</td>
                                <td>{{ $companie->telefono_movil }}</td>
                                <td>{{ $companie->fecha_ultimo_contacto }}</td>
                                <td>{{ $companie->plazas_disponibles }}</td>
                                <td>{{ $companie->observaciones }}</td>
                                <td>{{ $companie->course->nombre  ?? '-'}}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $companie->id) }}" class="btn">
                                        <img src="image/edit.png" alt="" class="icons">
                                    </a>
    
                                    <form action="{{ route('companies.delete', $companie) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn">
                                            <img src="image/delete.png" alt="" class="icons">
                                        </button>
                                    </form>
    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr class="text-secondary">
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>C.P.</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Provincia</th>
                            <th>Web</th>
                            <th>Nombre contacto</th>
                            <th>Apellido contacto</th>
                            <th>Email contacto</th>
                            <th>Teléfono fijo</th>
                            <th>Teléfono móvil</th>
                            <th>Fecha último contacto</th>
                            <th>Plazas disponibles</th>
                            <th>Observaciones</th>
                            <th>Alumnos de...</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/users/user.css">

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
    {{-- <script src="//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json"></script> --}}
    <script src='build/pdfmake.min.js'></script>
    <script>
        let table = new DataTable('#myTable', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
            },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    className: 'form-btn', // Aquí añades la clase
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    // className: 'form-btn' // Aquí añades la clase
                }
            ],
            // columnDefs: [{
            //     targets: 0,
            //     visible: false
            // }]
        });
    </script>
@stop

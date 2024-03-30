@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="css/companies/company.css">
@endsection

@section('title', 'Empresas')

@section('content')
    <div class="container-fluid mt-5">
        <h1>Listado de empresas</h1>

        <div class="row">
            <div class="col-12">

                <div class="mt-2">
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
                    <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-12 mt-4 table-responsive">
                <div class="paginar">
                    {{ $companies->links('pagination::bootstrap-5') }}
                </div>
                <table class="table table-striped">
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


                    </tr>
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
                            <td>{{ $companie->apellido_contacto}}</td>
                            <td>{{ $companie->email_contacto }}</td>
                            <td>{{ $companie->telefono_fijo }}</td>
                            <td>{{ $companie->telefono_movil }}</td>
                            <td>{{ $companie->fecha_ultimo_contacto}}</td>
                            <td>{{ $companie->plazas_disponibles }}</td>
                            <td>{{ $companie->observaciones }}</td>
                            <td>{{ $companie->course->nombre }}</td>




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
                                @if ($companie->subir_cv)
                                    <a href="{{ asset('storage/' . $companie->subir_cv) }}" class="btn" target="_blank">
                                        <img src="image/pdf.png" alt="" class="icons">
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="paginar">
                    {{ $companies->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection

@section('scripts')

    <script src="js/companies/main.js"></script>
@endsection

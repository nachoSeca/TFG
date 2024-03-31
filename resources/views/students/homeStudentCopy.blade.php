@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="css/student.css">
@endsection

@section('title', 'Students Home')

@section('content')
    <div class="container-fluid">
        <h1>Listado de alumnos</h1>

        <div class="row">
            <div class="col-12">

                <div>
                    <a href="{{ route('students.create') }}" class="form-btn">Añadir estudiante</a>
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
                    {{ $students->links('pagination::bootstrap-5') }}
                </div>
                <table class="table table-striped">
                    <tr class="text-secondary">
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Móvil</th>
                        <th>Curso</th>
                        <th>Nota media</th>
                        <th>Subir CV</th>
                        <th>Empresa prácticas</th>
                        <th>Fecha inicio prácticas</th>
                        <th>Fecha fin prácticas</th>
                        <th>Dirección prácticas</th>
                        <th>Nombre tutor</th>


                    </tr>
                    @foreach ($students as $student)
                        <tr>
                            <td class="fw-bold">{{ $student->nombre }}</td>
                            <td>{{ $student->apellidos }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->telefono_movil }}</td>
                            <td>{{ $student->course->nombre }}</td>
                            <td>{{ $student->nota_media }}</td>
                            <td>{{ $student->subir_cv }}</td>
                            <td>{{ $student->company->nombre  ?? '-'}}</td>
                            <td>{{ $student->fecha_inicio_fct }}</td>
                            <td>{{ $student->fecha_fin_fct }}</td>
                            <td>{{ $student->direccion_practicas  ?? '-' }}</td>
                            <td>{{ $student->tutor->nombre ?? '-' }}</td>


                            <td>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn">
                                    <img src="image/edit.png" alt="" class="icons">
                                </a>

                                <form action="{{ route('students.delete', $student) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn">
                                        <img src="image/delete.png" alt="" class="icons">
                                    </button>
                                </form>
                                @if ($student->subir_cv)
                                    <a href="{{ asset('storage/' . $student->subir_cv) }}" class="btn" target="_blank">
                                        <img src="image/pdf.png" alt="" class="icons">
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="paginar">
                    {{ $students->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection

@section('scripts')

    <script src="js/students/main.js"></script>
@endsection
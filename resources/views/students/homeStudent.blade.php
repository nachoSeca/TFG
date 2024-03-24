@extends('layouts.app')

@section('title', 'Students Home')

@section('content')
    <h1>Listado de alumnos</h1>
    <div class="row">
        <div class="col-12">

            <div>
                <a href="{{ route('students.create') }}" class="btn btn-primary">Añadir cliente</a>
            </div>
        </div>

        {{-- Mostramos mensaje de que se ingreso bien --}}
        @if (Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif

        <div class="col-12 mt-4">
            <div class="paginar">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
            <table class="table table-bordered text-white">
                <tr class="text-secondary">
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Móvil</th>
                    <th>Nota media</th>
                    <th>Fecha inicio prácticas</th>
                    <th>Fecha fin prácticas</th>
                    <th>Dirección prácticas</th>


                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td class="fw-bold">{{ $student->nombre }}</td>
                        <td>{{ $student->apellidos }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->telefono_movil }}</td>
                        <td>{{ $student->nota_media }}</td>
                        <td>{{ $student->fecha_inicio_fct }}</td>
                        <td>{{ $student->fecha_fin_fct }}</td>
                        <td>{{ $student->direccion_practicas }}</td>

                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Editar</a>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">Pedidos</a>
                            {{-- <a href="{{ route('clientes.confirmar_borrado', $customer->id) }}" class="btn btn-danger">Eliminar</a> --}}

                            {{-- <form action="{{ route('students.delete', $student) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="paginar">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection

@section('scripts')

<script src="js/students/main.js"></script>
@endsection

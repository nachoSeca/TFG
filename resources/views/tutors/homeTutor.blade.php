@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="css/tutors/tutor.css">
@endsection

@section('title', 'Tutores')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Listado de tutores</h1>

        <div class="row">
            <div class="col-12">

                <div>
                    <a href="{{ route('tutors.create') }}" class="form-btn">Añadir tutor</a>
                </div>
            </div>
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
                    {{ $tutors->links('pagination::bootstrap-5') }}
                </div>
                <table class="table table-striped" id="myTable">
                    <tr class="text-secondary">
                        <th>Nombre <img onclick="sortTable(0)" src="/image/order.png" alt="order" class="order"></th>
                        <th>Apellidos <img onclick="sortTable(1)" src="/image/order.png" alt="order" class="order"></th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Móvil</th>
                        <th>Acciones</th>



                    </tr>
                    @foreach ($tutors as $tutor)
                        <tr>
                            <td class="fw-bold">{{ $tutor->nombre }}</td>
                            <td>{{ $tutor->apellidos }}</td>
                            <td>{{ $tutor->email }}</td>
                            <td>{{ $tutor->user->name }}</td>
                            <td>{{ $tutor->telefono_movil }}</td>



                            <td>
                                <a href="{{ route('tutors.edit', $tutor->id) }}" class="btn">
                                    <img src="image/edit.png" alt="" class="icons">
                                </a>

                                <form action="{{ route('tutors.delete', $tutor) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn">
                                        <img src="image/delete.png" alt="" class="icons">
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="paginar">
                    {{ $tutors->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection

@section('scripts')
    <script src="js/tutors/tutor.js"></script>
@endsection

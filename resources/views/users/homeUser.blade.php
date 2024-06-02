@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Listado de usuarios</h1>
        <div class="row">
            <div class="col-12">
                <div>
                    @can('total')
                        <a href="{{ route('users.create') }}" class="form-btn">Añadir usuario</a>
                    @endcan
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
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                            {{-- <th>Nombre de Usuario</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="fw-bold">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (filter_var($user->avatar, FILTER_VALIDATE_URL))
                                        <!-- Si el avatar es una URL, asumimos que es un usuario de Google -->
                                        <img src="{{ $user->avatar }}" alt="Avatar del usuario">
                                    @else
                                        <!-- Si no es una URL, asumimos que es un usuario normal y la imagen está en el storage -->
                                        <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="Avatar del usuario">
                                    @endif
                                </td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        @switch($role->name)
                                            @case('admin')
                                                <span class="badge bg-danger">{{ $role->name }}</span>
                                            @break

                                            @case('tutor')
                                                <span class="badge bg-warning">{{ $role->name }}</span>
                                            @break

                                            @case('student')
                                                <span class="badge bg-success">{{ $role->name }}</span>
                                            @break
                                        @endswitch
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn">
                                        <img src="image/edit.png" alt="Avatar" class="icons">
                                    </a>
                                    @role('admin')
                                        <form action="{{ route('users.delete', $user) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn">
                                                <img src="image/delete.png" alt="" class="icons">
                                            </button>
                                        </form>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Avatar</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="paginar">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
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
    <script src='build/pdfmake.min.js'></script> {{-- <script src="//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json"></script> --}}
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
                    className: 'form-btn' // Aquí añades la clase
                }
            ],
            // columnDefs: [{
            //     targets: 0,
            //     visible: false
            // }]
        });
    </script>
@stop

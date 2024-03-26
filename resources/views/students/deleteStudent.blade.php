@extends('layouts.app')

@section('title', 'Confirmación de borrado')

@section('content')
    <h1>Eliminar estudiante</h1>

    <p>¿Estás seguro de que quieres eliminar al estudiante <strong>{{ $student->nombre }}</strong>?</p>

    <form method="POST" action="{{ route('students.destroy', $student->id) }}">
        @method('DELETE')
        @csrf

        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

@section('footer')

@endsection

@section('scripts')

@endsection

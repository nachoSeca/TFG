@extends('layouts.app')

@section('title', 'Confirmación de borrado')

@section('content')
    <h1>Eliminar tutor</h1>

    <p>¿Estás seguro de que quieres eliminar al tutor/a <strong>{{ $tutor->nombre }}</strong>?</p>

    <form method="POST" action="{{ route('tutors.destroy', $tutor->id) }}">
        @method('DELETE')
        @csrf

        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('tutors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

@section('footer')

@endsection

@section('scripts')

@endsection

@extends('layouts.app')

@section('title', 'Confirmación de borrado')

@section('content')
    <h1>Eliminar empresa</h1>

    <p>¿Estás seguro de que quieres eliminar a la empresa <strong>{{ $company->nombre }}</strong>?</p>

    <form method="POST" action="{{ route('companies.destroy', $company->id) }}">
        @method('DELETE')
        @csrf

        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

@section('footer')

@endsection

@section('scripts')

@endsection

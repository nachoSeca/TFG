@extends('adminlte::page')

@section('title', 'Welcome')

@section('content_header')
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="animate-charcter"> Bienvenido/a, {{ Auth::user()->name }}!</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-5">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <img src="/image/logo.png" alt="imagen logo" style="width: 300px">
            </div>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="css/welcome.css">


    @stop

    @section('js')

    @stop

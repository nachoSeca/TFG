@extends('layouts.noMenu')

@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <div class="container-fluid" id="inicio">
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
        <div id="section1" class="vh-100 text-white d-flex justify-content-center align-items-center">
            <section>
                <h1>
                    <span>Practi</span>
                    <span>
                        Hub
                        <span class="pops">
                            <span class="pop"></span>
                            <span class="pop"></span>
                            <span class="pop"></span>
                            <span class="pop"></span>
                            <span class="pop"></span>
                        </span>
                    </span>
                    <span>™</span>
                </h1>
                <br />
                <h2 class="text_main">¡Gestiona las prácticas de tus alumnos!</h2>
                <br />
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        @guest
                            <button onclick="window.location.href='{{ route('login') }}'">Inicio Sesión</button>
                        @endguest
                        @auth
                            <button onclick="window.location.href='{{ route('welcome.index') }}'">Ir a Welcome</button>
                        @endauth
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection

@section('footer')
@endsection

@section('scripts')
    <script src="main.js"></script>
@endsection

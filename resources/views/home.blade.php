@extends('layouts.noMenu')

@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="css/style.css">


    <!-- Floating Button -->
    <button onclick="window.location.href='#section1'" class="Btn" id="floating-button">
        <svg height="1.2em" class="arrow" viewBox="0 0 512 512">
            <path
                d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z">
            </path>
        </svg>
    </button>

    <!-- Initial container -->
    <div class="container-fluid" id="inicio">
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
                        <button onclick="window.location.href='{{ route('login') }}'">Inicio Sesión</button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Main container section 3 -->


    <!-- Main container section 2 -->


@endsection

@section('footer')
@endsection

@section('scripts')
    <script src="main.js"></script>
@endsection

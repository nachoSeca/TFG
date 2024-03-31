@extends('layouts.app')

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
                    <div class="col-6 d-flex justify-content-center">
                        <button onclick="window.location.href='#section2'">
                            Más información
                        </button>
                    </div>

                    
                    <div class="col-6 d-flex justify-content-center">
                        <button onclick="window.location.href='{{ route('login') }}'">Inicio Sesión</button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Main container section 3 -->
    <div class="container vh-100 text-center" id="section2">
        <h3>PractiHub</h3>
        <p>Getiona las prácticas de tus alumnos</p>
        <!-- Main uses -->
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="content">
                        <p class="heading">Alumnos</p>
                        <p class="para">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam
                            at voluptas minus culpa deserunt delectus sapiente inventore pariatur
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="content">
                        <p class="heading">Tutores</p>
                        <p class="para">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam
                            at voluptas minus culpa deserunt delectus sapiente inventore pariatur
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card3">
                    <div class="content">
                        <p class="heading">Empresas</p>
                        <p class="para">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam
                            at voluptas minus culpa deserunt delectus sapiente inventore pariatur
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- End principal container -->
    </div>

    <!-- Main container section 2 -->
    <div class="container vh-100 text-center" id="section2">
        <h3>PractiHub</h3>
        <p>Getiona las prácticas de tus alumnos</p>
        <!-- Main uses -->
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Tutores</strong></p>
                <br />
                <a href="#infoTutores" data-bs-toggle="collapse">
                    <img src="image/teacher.png" alt="Profesor" class="image_uses" />
                </a>
                <div id="infoTutores" class="collapse">
                    <p>Los tutores pueden gestionar las prácticas de sus alumnos</p>
                </div>
            </div>
            <div class="col-sm-4">
                <p><strong>Alumnos</strong></p>
                <br />
                <a href="#infoAlumnos" data-bs-toggle="collapse">
                    <img src="/image/Studying.png" alt="Estudiante" class="image_uses" />
                </a>
                <div id="infoAlumnos" class="collapse">
                    <p>
                        Los alumnos pueden ver las prácticas disponibles y solicitarlas
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <p><strong>Empresas</strong></p>
                <br />
                <a href="#infoEmpresas" data-bs-toggle="collapse">
                    <img src="image/company.png" alt="Empresa" class="image_uses" />
                </a>
                <div id="infoEmpresas" class="collapse">
                    <p>Las empresas pueden publicar prácticas para los alumnos</p>
                </div>
            </div>
        </div>

        <!-- End principal container -->
    </div>

@endsection

@section('footer')
@endsection

@section('scripts')
    <script src="main.js"></script>
@endsection

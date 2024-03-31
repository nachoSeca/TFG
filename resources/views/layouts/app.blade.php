<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    {{-- FAVICON --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Tabulator
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

    {{-- DATATABLES --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script> --}}

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/orderFilter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">


    @yield('styles')
    <title>@yield('title')</title>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" class="animated">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top"  id="navbar">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('tutors.index') }}">
            <img src="/image/logo.png" alt="Logo" width="50" height="40"
                class="d-inline-block align-text-top">
            <span class="ms-2">PractiHub</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'tutors.index' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('tutors.index') }}">Tutores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'students.index' ? 'active' : '' }}"
                        href="{{ route('students.index') }}">Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'companies.index' ? 'active' : '' }}"
                        href="{{ route('companies.index') }}">Empresas</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Búsqueda por nombre..."> <br>

            </form>
        </div>
    </nav>
    {{-- End Navbar --}}
    @yield('content')

    @yield('footer')

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>

    @yield('scripts')
</body>

</html>

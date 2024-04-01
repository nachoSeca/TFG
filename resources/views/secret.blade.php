<!DOCTYPE html>
<html>

<head>
    <metal charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" 
        <title>Página privada</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-betal/dist
/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/
X+R7YkIZDRvuzKMRqM+OrBnVFBL6D0itfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4
border-bottom">
            <a class="d-flex align-items-center col-md-3 mb-2 mb-md -0 text-dark text-decoration-none">
                Página privada @auth
                {{ auth()->user()->name }}
                    
                @endauth
            </a>
                <div class="col-md-3 text-end">
                    <a href="{{ route('logout') }}"><button type="button"
                            class="btn btn-outline-primary me-2">Salir</button></a>
                </div>
        </header>
    </div>
    <article class="container">
        <h2>Tu sección privada</h2>
    </article>
</body>

</html>

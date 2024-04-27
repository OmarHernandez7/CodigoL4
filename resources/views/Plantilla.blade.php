<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('titulo')</title> 


    <style>
        .navbar {
            background-color: #000;
        }
    </style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: blue;" href="{{ route('nota.index') }}">GESTION DE NOTAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: white;" aria-current="page"
                            href="{{ route('nota.crear') }}">CREAR NOTA:</a>
                    </li>

                    <li class="nav-item">
                        <button type="button" class="btn btn" style="color: cyan;" data-bs-toggle="modal"
                            data-bs-target="#modal-categoria">
                            CREAR CATEGORIA
                        </button>

                        <div class="modal" id="modal-categoria" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">CREAR CATEGORIA:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('categoria.store') }}"
                                            class0="needs-validation">
                                            @csrf
                                            <label for="nombre">Nombre de la Categoría:</label>
                                            <input type="text" name="nombre" required>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Crear Categoría</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div>
        @yield('contenido')
    </div>

</body>

</html>

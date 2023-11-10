<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoshiApp.</title>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS v5.2.1 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="{{ asset('assets/estilos.css') }}" rel="stylesheet">
</head>
<body>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex align-items-center gradient-custom-2">
        <a class="navbar-brand" href="#">YoshiApp. Blog de Comida</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('posts')}}">Posts</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        @if (auth()->check())
                        Bienvenido, {{ auth()->user()->name }}
                        @endif
                    </a>
                </li>

                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Carrusel de recetas destacadas -->
<div id="carouselRecipes" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselRecipes" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselRecipes" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselRecipes" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./assets/enchiladas.jpg" class="d-block w-50 mx-auto" alt="Receta 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Enchiladas verdes</h5>
                <p>Deliciosa receta de enchiladas verdes, un platillo tradicional de la gastronomía mexicana.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/tacos.jpg" class="d-block w-50 mx-auto" alt="Receta 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tacos al pastor</h5>
                <p>Smoky, sweet, and super easy crispy edged roast pork tacos topped with broiled pineapples.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./assets/tostadas.jpg" class="d-block w-50 mx-auto" alt="Receta 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tostadas de tinga</h5>
                <p>These chicken tinga tostadas are easy to make and full of flavor! Easily customizable.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselRecipes" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselRecipes" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
</div>
<hr>
<!-- Sección de recetas destacadas -->
<section class="container my-5">
    <h2>Recetas Destacadas</h2>
    <br><br>
    <div class="container" style="text-align: center;">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/BmJ4QSR5SMo?si=CeagyYUyQSU7LrtJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>

        
    </div>
</section>

<!-- Pie de página -->
<footer class="container text-center py-3">
    <hr>
    <p>&copy; 2023 YoshiApp. Blog de Comida</p>
</footer>

<!-- Agregar enlaces a los archivos JavaScript de Bootstrap y jQuery al final del archivo HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

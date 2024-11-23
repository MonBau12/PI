<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orientacion Educativa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #C8102E; 
            color: white;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?psychology,therapy') no-repeat center center;
            background-size: cover;
            height: 60vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">OE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pacientes') }}">Pacientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('psicologos.index') }}">Psicólogos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('citas.historial') }}">Citas</a>
                </li>
                <!-- Aquí se recorre el botón hacia la derecha -->
                <li class="nav-item ms-auto">
                    <a class="nav-link" href="{{ route('login') }}">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

   
    @yield('contenido')

    <!-- Pie de página -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 Clínica de Psicólogos | <a href="#">Política de Privacidad</a></p>
        <div>
            <a href="#" class="me-2">Facebook</a>
            <a href="#" class="me-2">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

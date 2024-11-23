<!-- //nadvar alumno// -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Portal del Alumno</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('alumno.perfil') }}">Editar Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('alumno.datos-personales') }}">Editar Datos Personales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('citas.create') }}">Pedir Cita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('citas.historial') }}">Historial de Citas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Editar Datos Personales</h2>

  <form action="{{ route('alumno.updateDatosPersonales') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion" value="{{ auth()->user()->direccion }}" required>
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Editar Datos Personales</h2>

  <form action="{{ route('alumno.updateDatosPersonales') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion" value="{{ auth()->user()->direccion }}" required>
    </div>

    <div class="mb-3">
      <label for="telefono" class="form-label">Teléfono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  </form>
</div>
@endsection

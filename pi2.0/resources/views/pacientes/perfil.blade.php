@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Editar Perfil</h2>

  <form action="{{ route('alumno.updatePerfil') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre Completo</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}" required>
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Foto de Perfil</label>
      <input type="file" class="form-control" id="foto" name="foto">
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  </form>
</div>
@endsection

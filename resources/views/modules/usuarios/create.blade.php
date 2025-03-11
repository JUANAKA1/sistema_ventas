@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
    
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Agregar Usuarios</h1>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agregar Nuevo Usuario</h5>
              <form action="{{ route('usuarios.store') }}" method="POST" >
                @csrf
                <label for="name">Nombre del usuario</label>
                <input type="text" class="form-control" name="name" id="mane" required>
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" required>
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <label for="rol">Rol de usuario</label>
                <select class="form-select" name="rol" id="rol" required>
                  <option value="">Seleccione un rol</option>
                  <option value="admin">Admin</option>
                  <option value="cajero">Cajero</option>
                </select>
                <button class="btn btn-primary mt-3">Guardar</button>
                <a href="{{ route('usuarios') }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

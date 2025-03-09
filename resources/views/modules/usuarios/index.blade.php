@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
    
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Usuarios</h1>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Usuarios</h5>
              <p>
                Administrar las cuentas y roles de usuarios.
              </p> 
              <!-- Table with stripped rows -->
              <a href="" class="btn btn-primary" >
                <i class="fa-solid fa-user-plus"></i>
                Agregar nuevo usuario</a>
              <hr>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Cambio de contrseña</th>
                    <th>Activo</th>
                    <th >Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td>{{$item->email}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->rol}}</td>
                      <td>
                        <a href="#" class="btn btn-secondary " >
                          <i class="fa-solid fa-user-lock"></i>Cambiar</a>
                      </td>
                      </td>
                      <td>
                        @if ($item->activo)
                            <span class="badge bg-success">Activo</span>
                            @else
                            <span class="badge bg-warning text-dark">Inactivo</span>

                        @endif
                      </td>
                      <td>
                        <a href="#" class="btn btn-warning " > <i class="fa-solid fa-user-pen"></i>
                          </i> Editar</a>
                        <a href="#" class="btn btn-danger " >
                          <i class="fa-solid fa-user-gear"></i>  Eliminar</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
@endsection

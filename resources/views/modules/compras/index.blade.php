@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
    
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Compras de Productos</h1>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar compras </h5>
              <p>
                Administrar la compra de productos.
              </p> 
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio de compra</th>
                    <th>Total compra</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td>{{ $item->nombre_usuario }}</td>
                      <td>{{ $item->nombre_producto }}</td>
                      <td>{{ $item->cantidad }}</td>
                      <td>${{ $item->precio_compra }}</td>
                      <td>${{ $item->precio_compra * $item->cantidad }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                        <a href="{{ route('compras.edit', $item->id) }}" class="btn btn-warning " > <i class="fa-solid fa-pen-to-square">
                          </i> Editar</a>
                        <a href="{{ route('compras.show', $item->id) }}" class="btn btn-danger " >
                          <i class="fa-solid fa-trash-can"></i>  Eliminar</a>
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


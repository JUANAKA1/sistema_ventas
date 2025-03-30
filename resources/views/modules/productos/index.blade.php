@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
    
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Productos</h1>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Productos y stock </h5>
              <p>
                Administrar stock del sistema.
              </p> 
              <!-- Table with stripped rows -->
              <a href="{{ route('productos.create') }} " class="btn btn-primary" ><i class="fa-solid fa-circle-plus"></i> Crear producto</a>
              <hr>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Venta</th>
                    <th>Compra</th>
                    <th>Activo</th>
                    <th>Comprar</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                      @foreach ($items as $item) 
                    <tr>
                      <td>{{ $item->nombre_categoria }}</td>
                      <td>{{ $item->nombre_proveedor }}</td>
                      <td>{{ $item->nombre }}</td>
                      <td>
                        <img src="{{ asset('storage/' .$item->imagen_producto) }}" alt="" width="100px" height="100px">
                        <a href="{{ route('productos.show.image', $item->imagen_id)}}" class="badge rounded-pill text-bg-warning">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                      </td>
                      <td>{{ $item->descripcion }}</td>
                      <td>{{ $item->cantidad }}</td>
                      <td>${{ $item->precio_venta }}</td>
                      <td>${{ $item->precio_compra }}</td>
                      <td>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="{{ $item->id }}" 
                          {{ $item->activo ? 'checked' : '' }}>
                        </div>
                      </td>
                      <td>
                        <a href="{{ route('compras.create', $item->id ) }}" class="btn btn-success mt-3 " > <i class="fa-solid fa-cart-shopping"></i> Comprar</a>
                      </td>
                      <td>
                        <a href="{{ route('productos.edit', $item->id) }}" class="btn btn-warning  mt-3" > <i class="fa-solid fa-pen-to-square">
                          </i> Editar</a>
                        <a href="{{ route('productos.show', $item->id) }}" class="btn btn-danger  mt-3" >
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
@push('scripts')
<script>
    function cambiar_estado(id, estado) {
      $.ajax({
        type: "GET",
        url: "productos/cambiar-estado/" +  id + "/" + estado,
        success: function(respuesta) {
          if (respuesta == 1) {
            Swal.fire({
              title: 'Exito!',
              text: 'Cambio de estado exitoso!',
              icon: 'success',
              confirmButtonText: 'Aceptar'
            });
          } else {
            Swal.fire({
              title: 'Fallo!',
              text: 'No se pudo cambiar el estado!',
              icon: 'error',
              confirmButtonText: 'Aceptar'
            });
          }
        }
      });
    }
      $(document).ready(function() {
        $('.form-check-input').on("change", function(){
          let id = $(this).attr("id");
          let estado = $(this).is(":checked") ? 1 : 0;
          cambiar_estado(id, estado);
        });
    });
</script>
@endpush

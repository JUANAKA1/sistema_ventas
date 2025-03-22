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
                  </tr>
                </thead>
                <tbody>
                      @foreach ($items as $item) 
                    <tr>
                      <td>{{ $item->nombre_categoria }}</td>
                      <td>{{ $item->nombre_proveedor }}</td>
                      <td>{{ $item->nombre }}</td>
                      <td>{{ $item->imagen }}</td>
                      <td>{{ $item->descripcion }}</td>
                      <td>{{ $item->cantidad }}</td>
                      <td>{{ $item->precio_venta }}</td>
                      <td>{{ $item->precio_compra }}</td>
                      
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

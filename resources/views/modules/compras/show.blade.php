@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
    
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Eliminar compra de Producto</h1>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Eliminar compra</h5>
              <p>
                Una vez que la compra sea eliminada no podra ser recuperada!!.
              </p> 
              <table class="table">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio de compra</th>
                    <th>Total compra</th>
                    <th>Fecha</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>{{ $items->nombre_usuario }}</td>
                      <td>{{ $items->nombre_producto }}</td>
                      <td>{{ $items->cantidad }}</td>
                      <td>$ {{ $items->precio_compra }}</td>
                      <td>$ {{ $items->precio_compra * $items->cantidad }}</td>
                      <td>{{ $items->created_at }}</td>
                    </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <hr>
              <form action="{{ route('compras.destroy', $items->id ) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="text" value={{ $items->producto_id }} name="producto_id" hidden>
                <button class="btn btn-danger mt-3">Eliminar Compra</button>
                <a href="{{ route('compras') }}" class="btn btn-info mt-3">Cancelar</a>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
@endsection
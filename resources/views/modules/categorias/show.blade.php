@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
    
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Eliminar Categoria</h1>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">¿Estas seguro de eliminar esta categoria?</h5>
              <form action="{{route('categorias.destroy', $item->id )}} " method="POST" >
                @csrf
                @method('DELETE')
                <label for="nombre">Nombre de categoria</label>
                <input type="text" class="form-control" 
                name="nombre" id="nombre" readonly value="{{$item->nombre}}">
                <button class="btn btn-danger mt-3">Eliminar</button>
                <a href="{{ route('categorias') }}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

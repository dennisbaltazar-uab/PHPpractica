@extends('layouts.app')

@section('title', 'Nexus Games - Tienda de consolas y periféricos')
@section('content')
<div class="row">
    <div class="col-md-12 text-center mb-4">
        <h1 class="display-4">Bienvenido a Nexus Games</h1>
        <p class="lead">Encuentra las mejores consolas, juegos y periféricos al mejor precio.</p>
    </div>
</div>
<div class="row mb-5">
    <div class="col-12">
        <h2 class="mb-3">Categorías</h2>
    </div>
    @forelse($categorias as $categoria)
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="{{ route('categoria.show', $categoria->slug) }}" class="text-decoration-none">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <i class="fas fa-tag fa-2x text-primary"></i>
                        <h5 class="card-title">{{ $categoria->nombre }}</h5>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12"><p>No hay categorías disponibles.</p></div>
    @endforelse
</div>
<div class="row">
    <div class="col-12">
        <h2 class="mb-3">Últimos productos</h2>
    </div>
    @forelse($productos as $producto)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card product-card h-100">
                @if($producto->imagen)
                    <img src="{{ asset('storage/'.$producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                @else
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height:200px;">
                        <span class="text-white">Sin imagen</span>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ Str::limit($producto->descripcion, 60) }}</p>
                    <p class="card-text"><strong>Bs {{ number_format($producto->precio, 2) }}</strong></p>
                    <a href="{{ route('productos.show', $producto->slug) }}" class="btn btn-primary btn-sm">Ver detalles</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p>No hay productos disponibles.</p></div>
    @endforelse
</div>
@endsection
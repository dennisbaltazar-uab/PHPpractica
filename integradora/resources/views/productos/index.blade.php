@extends('layouts.app')

@section('title', 'Catálogo de productos - Nexus Games')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h5>Categorías</h5>
        <div class="list-group mb-4">
            <a href="{{ route('productos.index') }}" class="list-group-item list-group-item-action {{ !isset($categoria) ? 'active' : '' }}">
                Todas
            </a>
            @foreach(\App\Models\Categoria::all() as $cat)
                <a href="{{ route('categoria.show', $cat->slug) }}" 
                   class="list-group-item list-group-item-action {{ isset($categoria) && $categoria->id == $cat->id ? 'active' : '' }}">
                    {{ $cat->nombre }}
                </a>
            @endforeach
        </div>
    </div>
    <div class="col-md-9">
        <h1 class="mb-4">
            @if(isset($categoria))
                {{ $categoria->nombre }}
            @else
                Todos los productos
            @endif
        </h1>
        <div class="row">
            @forelse($productos as $producto)
                <div class="col-md-6 col-lg-4 mb-4">
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
                            <p class="card-text"><strong>Bs {{ number_format($producto->precio, 2) }}</strong></p>
                            <a href="{{ route('productos.show', $producto->slug) }}" class="btn btn-outline-primary btn-sm">Ver</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><p>No hay productos en esta categoría.</p></div>
            @endforelse
        </div>
        {{ $productos->links() }}
    </div>
</div>
@endsection
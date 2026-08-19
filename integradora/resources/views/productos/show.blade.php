@extends('layouts.app')

@section('title', $producto->nombre . ' - Nexus Games')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($producto->imagen)
            <img src="{{ asset('storage/'.$producto->imagen) }}" class="img-fluid rounded" alt="{{ $producto->nombre }}">
        @else
            <div class="bg-secondary d-flex align-items-center justify-content-center" style="height:400px;">
                <span class="text-white">Sin imagen</span>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <h1>{{ $producto->nombre }}</h1>
        <p class="text-muted">
            Categoría: <a href="{{ route('categoria.show', $producto->categoria->slug) }}">{{ $producto->categoria->nombre }}</a>
        </p>
        <p class="lead">Precio: <strong>Bs {{ number_format($producto->precio, 2) }}</strong></p>
        <p>Stock: {{ $producto->stock }} unidades</p>
        <p>{{ $producto->descripcion }}</p>
        <p><small>Proveedor: {{ $producto->proveedor->nombre }}</small></p>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver al catálogo</a>
    </div>
</div>
@endsection
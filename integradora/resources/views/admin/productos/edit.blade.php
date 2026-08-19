@extends('layouts.app')

@section('title', 'Editar Producto - Nexus Games')
@section('content')
<h1>Editar Producto: {{ $producto->nombre }}</h1>
<form action="{{ route('admin.productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="precio" class="form-label">Precio (Bs)</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
        </div>
        <div class="col-md-6">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoría</label>
        <select class="form-select" id="categoria_id" name="categoria_id" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="proveedor_id" class="form-label">Proveedor</label>
        <select class="form-select" id="proveedor_id" name="proveedor_id" required>
            @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" {{ $proveedor->id == $producto->proveedor_id ? 'selected' : '' }}>
                    {{ $proveedor->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen (opcional)</label>
        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
        @if($producto->imagen)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$producto->imagen) }}" alt="Imagen actual" style="height: 100px;">
                <p class="text-muted">Imagen actual</p>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
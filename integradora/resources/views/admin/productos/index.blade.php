@extends('layouts.app')

@section('title', 'Gestionar Productos - Nexus Games')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Productos</h1>
    <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">+ Nuevo Producto</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio (Bs)</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->categoria->nombre }}</td>
            <td>{{ number_format($producto->precio, 2) }}</td>
            <td>{{ $producto->stock }}</td>
            <td>
                <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No hay productos registrados.</td></tr>
        @endforelse
    </tbody>
</table>
{{ $productos->links() }}
@endsection
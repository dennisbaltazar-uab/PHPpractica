@extends('layouts.app')

@section('title', 'Panel de Administración - Nexus Games')
@section('content')
<h1 class="mb-4">Panel de Administración</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Productos</h5>
                <p class="card-text display-6">{{ \App\Models\Producto::count() }}</p>
                <a href="{{ route('admin.productos.index') }}" class="btn btn-light">Gestionar</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Categorías</h5>
                <p class="card-text display-6">{{ \App\Models\Categoria::count() }}</p>
                <a href="{{ route('admin.categorias.index') }}" class="btn btn-light">Gestionar</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Proveedores</h5>
                <p class="card-text display-6">{{ \App\Models\Proveedor::count() }}</p>
                <a href="{{ route('admin.proveedores.index') }}" class="btn btn-light">Gestionar</a>
            </div>
        </div>
    </div>
</div>
@endsection
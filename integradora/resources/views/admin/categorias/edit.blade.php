@extends('layouts.app')

@section('title', 'Editar Categoría - Nexus Games')
@section('content')
<h1>Editar Categoría: {{ $categoria->nombre }}</h1>
<form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción (opcional)</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $categoria->descripcion) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
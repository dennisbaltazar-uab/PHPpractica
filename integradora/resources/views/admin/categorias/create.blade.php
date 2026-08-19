@extends('layouts.app')

@section('title', 'Nueva Categoría - Nexus Games')
@section('content')
<h1>Nueva Categoría</h1>
<form action="{{ route('admin.categorias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción (opcional)</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
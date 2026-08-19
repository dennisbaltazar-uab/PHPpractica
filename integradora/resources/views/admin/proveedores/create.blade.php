@extends('layouts.app')

@section('title', 'Nuevo Proveedor - Nexus Games')
@section('content')
<h1>Nuevo Proveedor</h1>
<form action="{{ route('admin.proveedores.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
    </div>
    <div class="mb-3">
        <label for="contacto" class="form-label">Persona de contacto (opcional)</label>
        <input type="text" class="form-control" id="contacto" name="contacto" value="{{ old('contacto') }}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono (opcional)</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email (opcional)</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección (opcional)</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="2">{{ old('direccion') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('admin.proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
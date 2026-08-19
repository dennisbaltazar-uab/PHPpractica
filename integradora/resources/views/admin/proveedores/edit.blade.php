@extends('layouts.app')

@section('title', 'Editar Proveedor - Nexus Games')
@section('content')
<h1>Editar Proveedor: {{ $proveedor->nombre }}</h1>
<form action="{{ route('admin.proveedores.update', $proveedor) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $proveedor->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="contacto" class="form-label">Persona de contacto</label>
        <input type="text" class="form-control" id="contacto" name="contacto" value="{{ old('contacto', $proveedor->contacto) }}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $proveedor->telefono) }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $proveedor->email) }}">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="2">{{ old('direccion', $proveedor->direccion) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
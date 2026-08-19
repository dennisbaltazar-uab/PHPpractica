@extends('layouts.app')

@section('title', 'Gestionar Proveedores - Nexus Games')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Proveedores</h1>
    <a href="{{ route('admin.proveedores.create') }}" class="btn btn-primary">+ Nuevo Proveedor</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->id }}</td>
            <td>{{ $proveedor->nombre }}</td>
            <td>{{ $proveedor->contacto }}</td>
            <td>{{ $proveedor->telefono }}</td>
            <td>{{ $proveedor->email }}</td>
            <td>
                <a href="{{ route('admin.proveedores.edit', $proveedor) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('admin.proveedores.destroy', $proveedor) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No hay proveedores.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
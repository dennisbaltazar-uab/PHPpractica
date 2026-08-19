@extends('layouts.app')

@section('title', 'Librería El Lápiz - Nuevo libro')
@section('h1', 'Librería El Lápiz')

@section('content')
    <h2 style="font-weight: 400; font-size: 1.5rem; margin-bottom: 1.5rem;">Registrar un nuevo libro</h2>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/libros/nuevo" method="POST" style="max-width: 400px;">
        @csrf

        <div style="margin-bottom: 1rem;">
            <label for="titulo" style="display: block; font-weight: 500; margin-bottom: 0.3rem;">Título del libro</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="precio" style="display: block; font-weight: 500; margin-bottom: 0.3rem;">Precio en Bs</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio') }}" style="width: 100%; padding: 0.6rem; border: 1px solid #ccc; border-radius: 6px;">
        </div>

        <button type="submit" class="btn" style="border: none; cursor: pointer;">Registrar libro</button>
    </form>
@endsection
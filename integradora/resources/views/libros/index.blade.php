@extends('layouts.app')

@section('title', 'Librería El Lápiz')
@section('h1', 'Librería El Lápiz')

@section('content')
    <p class="subtitulo">Bienvenidos a la librería de barrio que cuida a sus lectores. Aquí encontrarás títulos para todas las edades.</p>

    <p><strong>Hay {{ count($libros) }} libros en el catálogo.</strong></p>

    <ul style="list-style: none; padding: 0; margin-top: 1.5rem;">
        @foreach ($libros as $libro)
            <li style="background: #f8fafc; padding: 0.8rem 1rem; margin-bottom: 0.5rem; border-radius: 8px; border-left: 4px solid #1e4f8a;">
                <strong>{{ $libro->titulo }}</strong> — Bs {{ $libro->precio }}
            </li>
        @endforeach
    </ul>

    <p style="margin-top: 1rem; font-style: italic;">Catálogo atendido por Dennis Alexander Baltazar Condori</p>

    <a href="/libros/nuevo" class="btn">Agregar nuevo libro</a>
@endsection
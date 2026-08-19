@extends('layouts.app')

@section('title', 'Iniciar sesión - Nexus Games')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center">Iniciar sesión</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
            <p class="mt-3 text-center">
                ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
            </p>
        </form>
    </div>
</div>
@endsection
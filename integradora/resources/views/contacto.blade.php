@extends('layouts.app')

@section('title', 'Contacto - Nexus Games')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <h1 class="text-center">Contáctanos</h1>
        <p class="text-center">Estamos aquí para ayudarte. Escríbenos y te responderemos lo antes posible.</p>
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
        <div class="mt-4 text-center">
            <p><i class="fas fa-phone"></i> +591 74852201</p>
            <p><i class="fas fa-envelope"></i> nexus@games.com</p>
            <p><i class="fas fa-map-marker-alt"></i> Av. Principal, Ciudad</p>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
@section('content')

<style>

body {
        background-color: #f0f8f0; /* Fondo general en verde claro */
        font-family: 'Poppins', sans-serif;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-success text-white sidebar shadow-sm" style="height: 100vh; border-radius: 0 20px 20px 0;">
            <div class="position-sticky pt-3">
                <h4 class="text-center text-white mb-4">EcoVest</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dashboard') }}">
                            📊 Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            🌿 Mis Reciclajes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            🏆 Premios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('community-posts.index') }}">
                        ♻️ Comunidad
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('recycling-centers.index') }}">
                            ♻️ Centros de Reciclaje
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

<div class="container" style="max-width: 600px;">
    <h2 class="my-4  text-center">Publicaciones de la Comunidad</h2>

    <!-- Botón para crear nueva publicación -->
    <div class="mb-4 text-center">
    <a href="{{ route('community-posts.create') }}" class="btn btn-success">
    <i class="bi bi-pencil-square"></i> Crear Nueva Publicación
</a>

    </div>

    <!-- Feed de Publicaciones -->
<!-- Feed de Publicaciones -->
@foreach($communityPosts as $post)
<div class="card mb-3 shadow-sm" style="border-radius: 10px;">
    <div class="card-body">
        <!-- Encabezado del Post -->
        <div class="d-flex align-items-center mb-2">
            <img src="{{ $post->user->avatar_url ? asset('storage/' . $post->user->avatar_url) : asset('images/default-avatar.png') }}" 
                 alt="Avatar" class="rounded-circle me-2" width="40" height="40">
            <div>
                <h6 class="mb-0 text-primary">{{ $post->user->name }}</h6>
                <small class="text-muted">{{ \Carbon\Carbon::parse($post->date)->format('d/m/Y') }}</small>
            </div>
        </div>

        <!-- Contenido del Post -->
        <h5 class="card-title text-primary">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>
        <div class="mb-2">
            <span class="badge bg-info text-dark">{{ ucfirst($post->type) }}</span>
        </div>
        
        <!-- Botones de acciones (Editar/Eliminar) -->
        @if($post->user_id == auth()->id())
        <div class="d-flex justify-content-end">
            
            <form action="{{ route('community-posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </div>
        @endif
    </div>
</div>
@endforeach

</div>
@endsection

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
                        <a class="nav-link text-white" href="#">
                            📊 Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            🌿 Mis Reciclajes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('recycling.materials.index') }}">
                            <i class="bi bi-trash3-fill me-2"></i> Materiales Reciclables
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="http://127.0.0.1:8000/rewards">
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

        <!-- Contenido Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <!-- Header con Foto de Perfil e Info del Usuario -->
            <div class="d-flex justify-content-between align-items-center my-4">
                <div class="d-flex align-items-center">
                    <img src="{{ Auth::user()->avatar_url ? asset('storage/' . Auth::user()->avatar_url) : asset('images/default-avatar.png') }}" 
                         alt="Foto de Perfil" class="rounded-circle border border-black shadow-sm" width="80" height="80">
                    <div class="ms-3">
                        <h2 >¡Hola, {{ Auth::user()->name }}!</h2>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Secciones de Contenido -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg rounded-3 border-0">
                        <div class="card-body">
                            <h5 class="text-success">
                                <a href="http://127.0.0.1:8000/recycling-materials" class="text-success text-decoration-none">
                                    🌱 Progreso de Reciclaje
                                </a>
                            </h5>
                            <p>Aquí podrás ver tu progreso y estadísticas detalladas.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg rounded-3 border-0">
                        <div class="card-body">
                            <h5 class="text-success">
                                <a href="http://127.0.0.1:8000/rewards" class="text-success text-decoration-none">
                                    🏅 Premios Disponibles
                                </a>
                            </h5>
                            <p>Canjea tus puntos por increíbles premios.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

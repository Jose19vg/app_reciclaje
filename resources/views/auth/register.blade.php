@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

@section('content')
<style>
    body {
        background-color: #f0f8f0; /* Un verde claro para el fondo general */
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .glass-card {
        background: rgba(86, 171, 47, 0.9); /* Verde EcoVest con transparencia */
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .glass-header {
        font-size: 1.8rem;
        font-weight: 600;
        color: #fff;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 12px;
    }

    .btn-eco {
        background-color: #ffffff;
        color: #28a745;
        border-radius: 12px;
        padding: 12px;
        font-size: 16px;
        border: 2px solid #28a745;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-eco:hover {
        background-color: #28a745;
        color: white;
    }

    .footer-text {
        color: white;
        font-size: 0.9rem;
    }

    a {
        color: #ffffff;
        text-decoration: underline;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-8">
        <div class="glass-card">
            <div class="glass-header">{{ __('Regístrate en EcoVest') }}</div>
            
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">{{ __('Nombre Completo') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">{{ __('Correo Electrónico') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">{{ __('Contraseña') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label text-white">{{ __('Confirmar Contraseña') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <!-- Avatar (Foto de Perfil) -->
                    <div class="mb-3">
                        <label for="avatar_url" class="form-label text-white">{{ __('Foto de Perfil (Opcional)') }}</label>
                        <input id="avatar_url" type="file" class="form-control @error('avatar_url') is-invalid @enderror" name="avatar_url" accept="image/*">
                        @error('avatar_url')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Botón de Registro -->
                    <div class="text-center">
                        <button type="submit" class="btn-eco">
                            {{ __('Registrarse') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Pie de Página -->
            <div class="text-center mt-4">
                <small class="footer-text">¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a></small>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

@section('content')
<style>
    body {
        background-color: #f0f8f0; /* Fondo general en verde claro */
        font-family: 'Poppins', sans-serif;
    }

    .glass-card {
        background: rgba(86, 171, 47, 0.9); /* Fondo verde semi-transparente */
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
            <div class="glass-header">{{ __('Bienvenido a EcoVest') }}</div>
            <p class="text-center text-white">Inicia sesión para continuar</p>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">{{ __('Correo Electrónico') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ejemplo@correo.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">{{ __('Contraseña') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password" placeholder="********">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                               {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-white" for="remember">
                            {{ __('Recordarme') }}
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="text-center">
                        <button type="submit" class="btn-eco">
                            {{ __('Iniciar Sesión') }}
                        </button>
                    </div>

                    <!-- Olvidé mi contraseña -->
                    <div class="text-center mt-3">
                        @if (Route::has('password.request'))
                            <a class="footer-text" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

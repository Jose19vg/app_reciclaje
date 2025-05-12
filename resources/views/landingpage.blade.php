<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@extends('layouts.app')

@section('content')
<style>
    
    body {
        background: linear-gradient(135deg, #D4EDDA, #A8D5BA);
        height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    .card-custom {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    
    .btn-custom {
        border-radius: 30px;
        font-size: 1.2rem;
        padding: 12px 30px;
        transition: all 0.3s ease;
        
    }
    
    .btn-success:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    .btn-outline-success:hover {
        background-color: #a8d5ba;
        color: #fff;
        transform: scale(1.05);
    }


    h1 {
        font-weight: bold;
    }
    p {
        font-size: 1.4rem;
    }

    .content-container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px; 
    }
</style>


<div class="content-container">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-body">
                        <h1 class="display-4 text-success mb-4">🌿 ¡Bienvenido a EcoVest! 🌿</h1>
                        <p class="lead text-muted mb-4">Juntos podemos hacer del mundo un lugar más limpio y verde.</p>
                        <p class="mb-4">Inicia sesión para descubrir puntos de reciclaje, tutoriales y más. Si aún no eres parte, regístrate y únete al cambio.</p>

                        <!-- Botones -->
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('login') }}" class="btn btn-success btn-custom me-3">Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-success btn-custom">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="row g-0">
            {{-- Imagen a la izquierda --}}
            <div class="col-md-4">
                @if($reward->image_url ?? $reward->imagen)
                    <img
                        src="{{ asset('storage/' . ($reward->image_url ?? $reward->imagen)) }}"
                        class="img-fluid rounded-start"
                        alt="{{ $reward->name ?? $reward->nombre }}">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height:100%;">
                        <i class="bi bi-image text-muted" style="font-size:4rem;"></i>
                    </div>
                @endif
            </div>

            {{-- Contenido a la derecha --}}
            <div class="col-md-8">
                <div class="card-body d-flex flex-column h-100">
                    {{-- Título --}}
                    <h2 class="card-title text-success">{{ $reward->name ?? $reward->nombre }}</h2>

                    {{-- Veces canjeable (stock) --}}
                    <p class="text-muted mb-2">
                        Disponible: <strong>{{ $reward->stock }}</strong> {{ Str::plural('vez', $reward->stock) }}
                    </p>

                    {{-- Botón Canjear --}}
                    <form action="{{ route('rewards.redeem', $reward) }}" method="POST" class="mb-3">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-gift-fill"></i> Canjear por <strong>{{ $reward->points_required ?? $reward->puntos_requeridos }} puntos</strong>
                        </button>
                    </form>

                    {{-- Descripción --}}
                    <h5>Descripción</h5>
                    <p class="card-text flex-grow-1">
                        {{ $reward->description ?? $reward->descripcion }}
                    </p>

                    {{-- Volver al listado --}}
                    <a href="{{ route('rewards.index') }}" class="mt-auto btn btn-link">
                        ← Volver a Premios
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-success">Premios Disponibles</h1>
        <a href="{{ route('rewards.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Agregar Premio
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @forelse($rewards as $reward)
            <div class="col-md-4 mb-4">
                <div class="card shadow rounded h-100">
                    @if($reward->image_url)
                        <img src="{{ asset('storage/' . $reward->image_url) }}"
                             class="card-img-top"
                             alt="{{ $reward->name }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success">{{ $reward->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($reward->description, 100) }}</p>
                        <p class="card-text"><strong>{{ $reward->points_required }} puntos</strong></p>
                        <p class="card-text">Stock: {{ $reward->stock }}</p>

                        <div class="mt-auto">
                            <a href="{{ route('rewards.show', $reward) }}"
                               class="btn btn-outline-primary w-100 mb-2">
                                <i class="bi bi-eye-fill"></i> Ver Detalle
                            </a>
                            <form action="{{ route('rewards.redeem', $reward) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="bi bi-gift-fill"></i> Canjear
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay premios disponibles.</p>
        @endforelse
    </div>
</div>
@endsection

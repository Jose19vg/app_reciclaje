@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('recycling-centers.create') }}" class="btn btn-success">➕ Agregar Centro</a>
        <a href="{{ route('dashboard') }}" class="btn btn-danger">Salir</a>
    </div>

    <div class="card shadow-lg border-success" style="border-radius: 12px;">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Centros de Reciclaje</h3>
        </div>
        <div class="card-body">

            <!-- Mensaje si no hay centros registrados -->
            @if ($recyclingCenters->isEmpty())
                <p class="text-center text-warning">🚨 No hay centros de reciclaje registrados aún.</p>
            @endif

            <div class="row">
                @foreach ($recyclingCenters as $centro)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg border-success" style="border-radius: 12px;">
                            <div class="card-body">
                                <h5 class="card-title text-success">{{ $centro->name }}</h5>
                                <p class="card-text">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <strong>Ubicación:</strong> 
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($centro->location) }}" 
                                       target="_blank" class="text-success">
                                        {{ $centro->location }}
                                    </a>
                                </p>
                                <p class="card-text"><i class="bi bi-phone-fill"></i> <strong>Contacto:</strong> {{ $centro->contact }}</p>
                                <p class="card-text"><i class="bi bi-recycle"></i> <strong>Materiales Aceptados:</strong> {{ $centro->materials_accepted }}</p>
                                <p class="card-text"><i class="bi bi-clock"></i> <strong>Horario:</strong> {{ $centro->schedule }}</p>

                                <!-- Botón Editar -->
                                <a href="{{ route('recycling-centers.edit', $centro->id) }}" class="btn btn-warning">✏️ Editar</a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('recycling-centers.destroy', $centro->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg border-success" style="border-radius: 12px;">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">✏️ Editar Centro de Reciclaje</h3>
            </div>
            <div class="card-body">
            <form action="{{ route('recycling-centers.update', $recyclingCenter->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="_method" value="PUT">

    <label>Nombre:</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $recyclingCenter->name) }}" required>

    <label>Ubicación:</label>
    <textarea name="location" class="form-control" required>{{ old('location', $recyclingCenter->location) }}</textarea>

    <label>Contacto:</label>
    <input type="text" name="contact" class="form-control" value="{{ old('contact', $recyclingCenter->contact) }}">

    <button type="submit" class="btn btn-success mt-3">✅ Guardar Cambios</button>
    <a href="{{ route('recycling-centers.index') }}" class="btn btn-secondary px-4">↩️ Volver</a>
</form>

            </div>
        </div>
    </div>
@endsection

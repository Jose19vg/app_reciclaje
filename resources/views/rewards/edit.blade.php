@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-success mb-4">Editar Premio</h1>

    <form action="{{ route('rewards.update', $reward) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Foto del Premio</label>
            <input type="file" name="image_url" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del Premio</label>
            <input type="text" name="name" class="form-control" value="{{ $reward->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Puntos Requeridos</label>
            <input type="number" name="points_required" class="form-control" value="{{ $reward->points_required }}" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $reward->stock }}" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $reward->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Premio</button>
        <a href="{{ route('rewards.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

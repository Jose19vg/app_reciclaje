@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-success mb-4">Agregar Nuevo Premio</h1>

    <form action="{{ route('rewards.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Foto del Premio</label>
            <input type="file" name="image_url" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del Premio</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Puntos Requeridos</label>
            <input type="number" name="points_required" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" min="0" value="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Premio</button>
        <a href="{{ route('rewards.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

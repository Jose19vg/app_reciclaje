@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
    <h2 class="my-4 text-center">Crear Nueva Publicación</h2>
    <form action="{{ route('community-posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="¿Qué estás pensando?" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="content" name="content" rows="4" placeholder="Escribe tu publicación aquí..." required></textarea>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select class="form-select" id="type" name="type" required>
                <option value="pregunta">Pregunta</option>
                <option value="compartir">Compartir</option>
                <option value="evento">Evento</option>
            </select>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Publicar</button>
        </div>
    </form>
</div>
@endsection

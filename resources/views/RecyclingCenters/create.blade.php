@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-success" style="border-radius: 12px;">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Agregar Centro de Reciclaje</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('recycling-centers.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombre del Centro</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ubicación</label>
                        <textarea name="location" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Materiales Aceptados</label>
                        <textarea name="materials_accepted" class="form-control" required></textarea>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contacto</label>
                        <input type="text" name="contact" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Horario</label>
                        <input type="text" name="schedule" class="form-control">
                    </div>

                    
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">Guardar Centro</button>
                    <a href="{{ route('recycling-centers.index') }}" class="btn btn-secondary px-4">↩️ Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

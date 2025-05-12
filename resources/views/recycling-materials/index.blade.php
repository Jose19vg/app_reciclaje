@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="mb-4">
            <a href="{{ route('dashboard') }}" class="btn btn-success">
                <i class="bi bi-arrow-left-circle"></i> Volver al Dashboard
            </a>
        </div>
        <h1 class="mb-0">♻️ Materiales Reciclables</h1>
        <span class="badge bg-primary">Total: {{ $materials->count() }} materiales</span>
    </div>

    <div class="row">
        @foreach($materials as $material)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="h5 mb-0">{{ $material->name }}</h3>
                </div>
                
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="{{ asset($material->image_path) }}" 
                             alt="{{ $material->name }}"
                             class="img-fluid rounded" 
                             style="max-height: 150px;">
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span class="badge bg-info">
                            <i class="bi bi-arrow-repeat me-1"></i>
                            {{ $material->points_per_unit }} pts/{{ $material->unit }}
                        </span>
                        <button class="btn btn-sm btn-outline-success" 
                                data-bs-toggle="modal" 
                                data-bs-target="#tipsModal{{ $material->id }}">
                            <i class="bi bi-lightbulb"></i> Consejos
                        </button>
                    </div>
                    
                    <h4 class="h6 text-muted">Beneficios ambientales:</h4>
                    <ul class="list-group list-group-flush mb-3">
                        @foreach($material->benefits as $benefit)
                        <li class="list-group-item small">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            {{ $benefit }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal de Consejos -->
        <div class="modal fade" id="tipsModal{{ $material->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Consejos para {{ $material->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            @foreach($material->recycling_tips as $tip)
                            <li class="list-group-item">
                                <i class="bi bi-arrow-right-circle text-success me-2"></i>
                                {{ $tip }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
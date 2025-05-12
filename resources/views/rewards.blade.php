@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Premios disponibles</h1>
        <p>Usa tus puntos de reciclaje para canjear increíbles premios.</p>

        <div class="row">
            @foreach($rewards as $reward)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/rewards/' . $reward->image) }}" class="card-img-top" alt="{{ $reward->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reward->name }}</h5>
                            <p class="card-text">Puntos requeridos: {{ $reward->points }}</p>
                            <a href="#" class="btn btn-primary">Canjear</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

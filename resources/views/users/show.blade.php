<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciclaje App</title>
    @vite('resources/css/app.css')
</head>
    <h1>Detalles del Usuario</h1>

    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Rol:</strong> {{ $user->role }}</p>
    <p><strong>Contraseña:</strong> {{ $user->password }}</p>
    <p><strong>Creado el:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('users.index') }}">Volver a la lista</a>
@endsection

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciclaje App</title>
    @vite('resources/css/app.css')
</head>

    <h1>Agregar Nuevo Usuario</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="name" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <label>Rol:</label>
        <input type="role" name="role" required>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">Volver</a>
@endsection

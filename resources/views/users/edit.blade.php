@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    @vite('resources/css/app.css')
</head>

<h1>Editar Usuario</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT') 

    <label>Nombre:</label>
    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

    <label>Contraseña:</label>
    <input type="password" name="password" value="{{ old('password', $user->password) }}">

    <label>Rol:</label>
    <input type="text" name="role" value="{{ old('role', $user->role) }}" required>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="{{ route('users.index') }}">Volver</a>

@endsection

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciclaje App</title>
    @vite('resources/css/app.css')
</head>

<h1>Lista de Usuarios</h1>
<a href="{{ route('users.create') }}">Nuevo Usuario</a>
<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} - {{ $user->email }}
            <a href="{{ route('users.show', $user) }}">Ver</a>
            <a href="{{ route('users.edit', $user) }}">Editar</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection

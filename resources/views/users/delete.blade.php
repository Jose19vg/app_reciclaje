@extends('layouts.app')

@section('content')

<h1>Ver Usuario</h1>

<p><strong>Nombre:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Rol:</strong> {{ $user->role }}</p>

<form action="{{ route('users.destroy', $user->id) }}" method="POST">
    @csrf
    @method('DELETE') 
    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar Usuario</button>
</form>

<br>
<a href="{{ route('users.index') }}">Volver</a>

@endsection

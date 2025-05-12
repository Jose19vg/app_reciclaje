@extends('layouts.app')

@section('content')
<h1>Agregar Producto</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="name" required>

    <label>QR Code:</label>
    <input type="text" name="qr_code" required>

    <label>Categoría:</label>
    <input type="text" name="category" required>

    <label>Material:</label>
    <input type="text" name="material" required>

    <label>Descripción:</label>
    <textarea name="description"></textarea>

    <label>Marca:</label>
    <input type="text" name="brand">

    <label>¿Reciclable?</label>
    <select name="recyclable">
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <button type="submit">Guardar</button>
</form>
<a href="{{ route('products.index') }}">Volver</a>
@endsection

@extends('layouts.app')

@section('content')
<h1>Editar Producto</h1>
<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="name" value="{{ $product->name }}" required>

    <label>QR Code:</label>
    <input type="text" name="qr_code" value="{{ $product->qr_code }}" required>

    <label>Categoría:</label>
    <input type="text" name="category" value="{{ $product->category }}" required>

    <label>Material:</label>
    <input type="text" name="material" value="{{ $product->material }}" required>

    <label>Descripción:</label>
    <textarea name="description">{{ $product->description }}</textarea>

    <label>Marca:</label>
    <input type="text" name="brand" value="{{ $product->brand }}">

    <label>¿Reciclable?</label>
    <select name="recyclable">
        <option value="1" {{ $product->recyclable ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ !$product->recyclable ? 'selected' : '' }}>No</option>
    </select>

    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('products.index') }}">Volver</a>
@endsection

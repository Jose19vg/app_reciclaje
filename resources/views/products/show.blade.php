@extends('layouts.app')

@section('content')
<h1>Detalles del Producto</h1>
<p><strong>Nombre:</strong> {{ $product->name }}</p>
<p><strong>QR Code:</strong> {{ $product->qr_code }}</p>
<p><strong>Categoría:</strong> {{ $product->category }}</p>
<p><strong>Material:</strong> {{ $product->material }}</p>
<p><strong>Descripción:</strong> {{ $product->description }}</p>
<p><strong>Marca:</strong> {{ $product->brand }}</p>
<p><strong>¿Reciclable?</strong> {{ $product->recyclable ? 'Sí' : 'No' }}</p>

<a href="{{ route('products.index') }}">Volver</a>
<a href="{{ route('products.edit', $product) }}">Editar</a>
<form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
</form>
@endsection

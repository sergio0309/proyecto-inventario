@extends('layouts.app')

@section('header')
    <x-shared.header-page 
        :title="$product->name" 
        path="products.index"
        button="Volver"
        :description="'Detalles de: '.$product->name"
    />
@endsection

@section('contenido')
    <div class="md:grid md:grid-cols-2">
        <div class="max-w-lg w-full mx-auto space-y-4">
            <label class="form-control" for="name">
                <span>Nombre:</span>
                <input disabled type="text" id="name" value="{{ $product->name }}" name="name">
            </label>

            <label class="form-control" for="description">
                <span>Descripcion:</span>
                <textarea disabled type="text" id="description" name="description">
                    {{ $product->description }}
                </textarea>
            </label>

            <label class="form-control" for="stock">
                <span>Stock Disponible:</span>
                <input disabled type="text" min="0" id="stock" value="{{ $product->stock }}" name="stock">
            </label>

            <label class="form-control" for="price">
                <span>Precio:</span>
                <input disabled type="number" id="price" value="{{ $product->price }}" name="price">
            </label>

            <label class="form-control" for="category_id">
                <span>Categoria:</span>
                <input disabled type="text" value="{{ $product->category->name }}" name="category">
            </label>

            <button class="btn-primary-icon w-full" type="submit">Guardar Producto</button>
            
        </div>
        <div>
            <h3 class="text-center text-xl font-bold">Imagen del producto</h3>
            <img class="max-w-md mx-auto" src="{{ '/'.$product->image }}" alt="{{ $product->name }}">
        </div>
    </div>
@endsection
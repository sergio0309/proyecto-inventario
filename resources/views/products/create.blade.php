@extends('layouts.app')

@section('header')
    <x-shared.header-page 
        title="Nuevo Producto" 
        path="products.index"
        button="Volver"
        description="Agrega un producto a tu inventario"
    />
@endsection

@section('contenido')
    <div class="md:grid md:grid-cols-2">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="max-w-lg w-full mx-auto space-y-4">
            @csrf
            <label class="form-control" for="name">
                <span>Nombre:</span>
                <input type="text" id="name" name="name">
            </label>

            <label class="form-control" for="description">
                <span>Descripcion:</span>
                <input type="text" id="description" name="description">
            </label>

            <label class="form-control" for="stock">
                <span>Stock Disponible:</span>
                <input type="text" min="0" id="stock" name="stock">
            </label>

            <label class="form-control" for="price">
                <span>Precio:</span>
                <input type="number" id="price" name="price">
            </label>

            <label class="form-control" for="image" class="form-control">
                <span>Seleccione una imagen</span>
                <input type="file" name="image" id="InputImage">
            </label>

            <label class="form-control" for="category_id">
                <span>Seleccione una categoria:</span>
                <select class="bg-secondary w-full py-3 px-2 rounded-md"
                        id="category_id" name="category_id">
                    @forelse ( $categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option>No hay Categorias</option>
                    @endforelse
                </select>
            </label>

            <button class="btn-primary-icon w-full" type="submit">Guardar Producto</button>
            
        </form>
        <div>
            <h3 class="text-center text-xl font-bold">Imagen del producto</h3>

            <p class="text-center" id="imagePreviewText"></p>
            <img id="imagePreview">
        </div>
    </div>
@endsection
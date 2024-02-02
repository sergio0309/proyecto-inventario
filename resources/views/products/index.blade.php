@extends('layouts.app')


@section('header')
    <x-shared.header-page 
        title="Productos" 
        path="products.create"
        button="Crear producto"
        description="Gestiona tus productos"
    />
@endsection

@section('contenido')
    <div class="table">
        <div class="min-w-min">
            <div class="grid grid-cols-9 gap-8">
                <h4 class="text-center">ID</h4>
                <h4 class="text-center">Imagen</h4>
                <h4 class="text-center">Nombre</h4>
                <h4 class="text-center">Descripcion</h4>
                <h4 class="text-center">Stock</h4>
                <h4 class="text-center">Precio</h4>
                <h4 class="text-center">Acciones</h4>
            </div>

            <div class="divider"></div>
            <div class="space-y-4">
                @forelse ($products as $product)
                   <form method="POST" action="{{ route('products.destroy', $product->id ) }}" class="grid grid-cols-9 gap-5 items-center">
                        @method('DELETE')
                        @csrf
    
                        <p class="text-center">{{ $product->id }}</p>
                        <img 
                            src="{{ $product->image }}" 
                            alt="{{ $product->image }}"
                            width="64"    
                        >
                        <p class="text-center">{{ $product->name }}</p>
                        <p class="text-center">{{ $product->description }}</p>
                        <p class="text-center">{{ $product->stock }}</p>
                        <p class="text-center">{{ $product->price }}</p>
                        <div class="col-span-3 flex items-center gap-4 text-center">
                            <a href="{{ route('products.show', $product->slog) }}" class="btn-primary-icon">
                                <i class="uil uil-eye"></i>
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-primary-icon">
                                <i class="uil uil-pen"></i>
                            </a>
                            <button type="submit" class="btn-danger-icon">
                                <i class="uil uil-trash-alt"></i>
                            </button>
                        </div>
                        
                    </form> 
                @empty
                    <p class="text-center">No hay Productos</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
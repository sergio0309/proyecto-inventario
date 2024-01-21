@extends('layouts.app')

@section('header')
    <x-shared.header-page
        title="Editar Categoria" 
        path="categories.index"
        button="Volver"
        description="Edita la categoria {{ $category->name }}"
    />
@endsection

@section('contenido')
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto space-y-5">
        @method('PUT')
        @csrf
        <label for="name" class="form-control">
            <span>Nombre</span>
            <input type="text" name="name" value="{{ $category->name }}">
        </label>

        <label for="image" class="form-control">
            <span>Imagen</span>
            <input type="file" name="image">
        </label>

        <button class="btn-primary-icon w-full">Actualizar</button>
    </form>
@endsection
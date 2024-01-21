@extends('layouts.app')

@section('header')
    <x-shared.header-page
        title="Nueva Categoria" 
        path="categories.index"
        button="Volver"
        description="Crea una nueva categoria"
    />
@endsection

@section('contenido')
    <form enctype="multipart/form-data" method="POST" action="{{ route('categories.store') }}" class="max-w-md mx-auto space-y-5">
        @csrf
        <label for="name" class="form-control">
            <span>Nombre</span>
            <input type="text" name="name" placeholder="Agrega un nombre a la categoria">
        </label>

        <label for="image" class="form-control">
            <span>Imagen</span>
            <input type="file" name="image">
        </label>

        <button class="btn-primary-icon w-full">Guardar</button>
    </form>
@endsection
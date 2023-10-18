@extends('layouts.app')

@section('titulo')
    crear comuna
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Crear Comuna</h2>

        <form action="{{ route('guardarComuna') }}" method="POST">
            @csrf

            <div class="mb-4 w-[40%]">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre de la Comuna</label>
                <input type="text" id="name" name="name" required placeholder="Ingresa la comuna..." class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4 w-[40%]">
                <label for="municipio" class="block text-sm font-medium text-gray-600">Municipio</label>
                <select type="text" id="municipio" name="municipio" required class="mt-1 p-2 w-full border rounded-md">
                    <option selected disabled value="">Escoge uno...</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-md">
                Guardar
            </button>

            <a href="{{ route('comunascrud') }}" type="submit" class="bg-red-400 hover:bg-red-500 text-white py-2 px-4 rounded-md">
                Cancelar
            </a>
        </form>
    </div>
@endsection

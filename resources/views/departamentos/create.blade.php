@extends('layouts.app')

@section('titulo')
    crear departamento
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Crear Departamento</h2>

        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf

            <div class="mb-4 w-[60%]">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre del departamento</label>
                <input type="text" id="name" name="name" required placeholder="Ingresa el departamento..." class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4 w-[60%]">
                <label for="pais" class="block text-sm font-medium text-gray-600">Pais</label>
                <select type="text" id="pais" name="pais" required class="mt-1 p-2 w-full border rounded-md">
                    <option selected disabled value="">Escoge uno...</option>
                    @foreach ($pais as $pais)
                        <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-md">
                Guardar
            </button>

            <a href="{{ route('departamentos.index') }}" type="submit" class="bg-red-400 hover:bg-red-500 text-white py-2 px-4 rounded-md">
                Cancelar
            </a>
        </form>
    </div>
@endsection

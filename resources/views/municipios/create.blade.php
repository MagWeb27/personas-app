@extends('layouts.app')

@section('titulo')
    crear municipio
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Crear Municipio</h2>

        <form action="{{ route('municipios.store') }}" method="POST">
            @csrf

            <div class="mb-4 w-[60%]">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre del municipio</label>
                <input type="text" id="name" name="name" required placeholder="Ingresa el municipio..." class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4 w-[60%]">
                <label for="departamento" class="block text-sm font-medium text-gray-600">Departamento</label>
                <select type="text" id="departamento" name="departamento" required class="mt-1 p-2 w-full border rounded-md">
                    <option selected disabled value="">Escoge uno...</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-md">
                Guardar
            </button>

            <a href="{{ route('municipios.index') }}" type="submit" class="bg-red-400 hover:bg-red-500 text-white py-2 px-4 rounded-md">
                Cancelar
            </a>
        </form>
    </div>
@endsection

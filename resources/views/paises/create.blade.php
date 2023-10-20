@extends('layouts.app')

@section('titulo')
    crear pais
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Crear Pais</h2>

        <form action="{{ route('paises.store') }}" method="POST">
            @csrf

            <div class="mb-4 w-[60%]">
                <label for="codigo" class="block text-sm font-medium text-gray-600">Codigo de pais</label>
                <input type="text" id="codigo" name="codigo" required placeholder="Ingrese un codigo para el pais..." class="mt-1 p-2 w-full border rounded-md"
                    aria-describedby="codigoHelp">
            </div>

            <div class="mb-4 w-[60%]">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre del pais</label>
                <input type="text" id="name" name="name" required placeholder="Ingresa el pais..." class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4 w-[60%]">
                <label for="capital" class="block text-sm font-medium text-gray-600">Codigo de Capital</label>
                <input type="text" id="capital" name="capital" required placeholder="Ingrese la capital (En numero)..." class="mt-1 p-2 w-full border rounded-md"
                    aria-describedby="codigoHelp">
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

            <a href="{{ route('paises.index') }}" type="submit" class="bg-red-400 hover:bg-red-500 text-white py-2 px-4 rounded-md">
                Cancelar
            </a>
        </form>
    </div>
@endsection

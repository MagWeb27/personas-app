@extends('layouts.app')

@section('titulo')
    editar pais
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Editar Pais</h1>
            <form action="{{ route('paises.update', ['pais' => $pais->pais_codi]) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-4 w-[60%]">
                    <label for="name" class="block text-sm font-medium text-gray-600">Pais</label>
                    <input type="text" required class="mt-1 p-2 w-full border rounded-md" id="name"
                        placeholder="Nombre del Pais..." name="name" value="{{ $pais->pais_nomb }}">
                </div>
                <div class="mb-4 w-[60%]">
                    <label for="capital" class="block text-sm font-medium text-gray-600">Codigo de capital</label>
                    <input type="text" required class="mt-1 p-2 w-full border rounded-md" id="capital"
                        placeholder="Ingrese la capital (En numero)..." name="capital" value="{{ $pais->pais_capi }}">
                </div>
                <div>
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-md">
                        Guardar
                    </button>

                    <a href="{{ route('municipios.index') }}" type="submit"
                        class="bg-red-400 hover:bg-red-500 text-white py-2 px-4 rounded-md">
                        Cancelar
                    </a>
                </div>
            </form>
    </div>
@endsection

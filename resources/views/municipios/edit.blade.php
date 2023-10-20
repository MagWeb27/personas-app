@extends('layouts.app')

@section('titulo')
    editar municipio
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Editar Municipio</h1>
            <form action="{{ route('municipios.update', ['municipio' => $municipio->muni_codi]) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-4 w-[60%]">
                    <label for="codigo" class="block text-sm font-medium text-gray-600">Id de municipio</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" id="id"
                        aria-describedby="codigoHelp" name="id" disabled="disabled" value="{{ $municipio->muni_codi }}">
                </div>
                <div class="mb-4 w-[60%]">
                    <label for="name" class="block text-sm font-medium text-gray-600">Municipio</label>
                    <input type="text" required class="mt-1 p-2 w-full border rounded-md" id="name"
                        placeholder="Nombre del Municipio..." name="name" value="{{ $municipio->muni_nomb }}">
                </div>

                <div class="mb-4 w-[60%]">
                    <label for="departamento" class="block text-sm font-medium text-gray-600">Departamento</label>
                    <select type="text" id="departamento" name="departamento" required
                        class="mt-1 p-2 w-full border rounded-md">
                        <option selected disabled value="">Escoge uno...</option>
                        @foreach ($departamentos as $departamento)
                            @if ($departamento->depa_codi == $municipio->depa_codi)
                                <option selected value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                            @else
                                <option value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                            @endif
                        @endforeach
                    </select>
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

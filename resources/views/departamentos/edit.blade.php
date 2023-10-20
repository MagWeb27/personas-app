@extends('layouts.app')

@section('titulo')
    editar departamento
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Editar Departamento</h1>
            <form action="{{ route('departamentos.update', ['departamento' => $departamento->depa_codi]) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-4 w-[60%]">
                    <label for="codigo" class="block text-sm font-medium text-gray-600">Id de departamento</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" id="id"
                        aria-describedby="codigoHelp" name="id" disabled="disabled" value="{{ $departamento->depa_codi }}">
                </div>
                <div class="mb-4 w-[60%]">
                    <label for="name" class="block text-sm font-medium text-gray-600">Departamento</label>
                    <input type="text" required class="mt-1 p-2 w-full border rounded-md" id="name"
                        placeholder="Nombre del departamento..." name="name" value="{{ $departamento->depa_nomb }}">
                </div>

                <div class="mb-4 w-[60%]">
                    <label for="pais" class="block text-sm font-medium text-gray-600">Pais</label>
                    <select type="text" id="pais" name="pais" required
                        class="mt-1 p-2 w-full border rounded-md">
                        <option selected disabled value="">Escoge uno...</option>
                        @foreach ($pais as $pais)
                            @if ($pais->pais_codi == $departamento->pais_codi)
                                <option selected value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                            @else
                                <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-md">
                        Guardar
                    </button>

                    <a href="{{ route('departamentos.index') }}" type="submit"
                        class="bg-red-400 hover:bg-red-500 text-white py-2 px-4 rounded-md">
                        Cancelar
                    </a>
                </div>
            </form>
    </div>
@endsection

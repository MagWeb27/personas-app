@extends('layouts.app')

@section('titulo')
    editar comuna
@endsection

@section('contenido')
    <div class="container w-[90%] mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Editar comuna</h1>
            <form action="{{ route('comunas.update', ['comuna' => $comuna->comu_codi]) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-4 w-[60%]">
                    <label for="codigo" class="block text-sm font-medium text-gray-600">Id de comuna</label>
                    <input type="text" class="mt-1 p-2 w-full border rounded-md" id="id"
                        aria-describedby="codigoHelp" name="id" disabled="disabled" value="{{ $comuna->comu_codi }}">
                </div>
                <div class="mb-4 w-[60%]">
                    <label for="name" class="block text-sm font-medium text-gray-600">Comuna</label>
                    <input type="text" required class="mt-1 p-2 w-full border rounded-md" id="name"
                        placeholder="Nombre de la comuna..." name="name" value="{{ $comuna->comu_nomb }}">
                </div>

                <div class="mb-4 w-[60%]">
                    <label for="municipio" class="block text-sm font-medium text-gray-600">Municipio</label>
                    <select type="text" id="municipio" name="municipio" required
                        class="mt-1 p-2 w-full border rounded-md">
                        <option selected disabled value="">Escoge uno...</option>
                        @foreach ($municipios as $municipio)
                            @if ($municipio->muni_codi == $comuna->muni_codi)
                                <option selected value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                            @else
                                <option value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-md">
                        Guardar
                    </button>

                    <a href="{{ route('comunascrud') }}" type="submit"
                        class="bg-red-400 hover:bg-red-500 text-white py-2 px-4 rounded-md">
                        Cancelar
                    </a>
                </div>
            </form>
    </div>
@endsection

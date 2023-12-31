@extends('layouts.app')

@section('titulo')
    comunas
@endsection

@section('contenido')
    <div class="overflow-x-auto">
        <div class="flex flex-col gap-4 justify-center mx-auto">
            @if (session('mensaje'))
                <div class="bg-green-500 text-white font-medium text-lg h-[45px] rounded flex items-center justify-between px-4">
                    <span>{{ session('mensaje') }}</span>
                    <button onclick="this.parentElement.style.display='none'" class="font-medium text-white">&times;</button>
                </div>
            @endif
            <div class="flex justify-start mb-2 ml-20">
                <p class="font-medium text-4xl drop-shadow-lg">Lista de comunas</p>
            </div>
            <div class="flex justify-start ml-20">
                <a href="{{ route('crearComuna') }}"
                    class="flex items-center mr-2 w-[80px] text-white p-2 mt-2 rounded bg-green-400 hover:bg-green-500 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Crear
                </a>
            </div>
            <table class="w-[90%] bg-white border border-gray-300 mx-auto shadow-xl">
                <thead class="bg-slate-400">
                    <tr class="text-white">
                        <th class="py-2 px-4 border-b">Codigo</th>
                        <th class="py-2 px-4 border-b">Comuna</th>
                        <th class="py-2 px-4 border-b">Municipio</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comunas as $comuna)
                        <tr>
                            <th scope="row">{{ $comuna->comu_codi }}</th>
                            <td class="py-2 px-4 border-b text-center">{{ $comuna->comu_nomb }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $comuna->muni_codi }}</td>
                            <td class="py-2 px-4 border-b flex items-center justify-center">

                                <a href="{{ route('comunas.edit', ['comuna' => $comuna->comu_codi]) }}"
                                    class="flex items-center mr-2 w-[80px] text-white p-2 mt-2 rounded bg-orange-400 hover:bg-orange-500 shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    Editar
                                </a>

                                <form action="{{ route('comunas.destroy', ['comuna' => $comuna->comu_codi]) }}"
                                    method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center mr-2 w-[90px] text-white p-2 mt-2 rounded bg-red-400 hover:bg-red-500 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

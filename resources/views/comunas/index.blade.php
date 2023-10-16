@extends('layouts.app')

@section('titulo')
    comunas
@endsection

@section('contenido')
    <div class="overflow-x-auto">
        <div class="flex flex-col gap-4 justify-center mx-auto">
            <div class="flex justify-start mb-2 ml-20">
                <p class="font-medium text-3xl">Lista de comunas</p>
            </div>
            <div class="flex justify-start ml-20">
                <button class="bg-green-400 hover:bg-green-500 text-white py-2 px-4 rounded-md">Crear</button>
            </div>
            <table class="w-[90%] bg-white border border-gray-300 text-left mx-auto">
                <thead class="bg-slate-400">
                    <tr class="text-white">
                        <th class="py-2 px-4 border-b">Codigo</th>
                        <th class="py-2 px-4 border-b">Comuna</th>
                        <th class="py-2 px-4 border-b">Municipio</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($comunas as $comuna)
                        
                    @endforeach --}}
                    <tr>
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">John Doe</td>
                        <td class="py-2 px-4 border-b">john.doe@example.com</td>
                        <!-- Agrega más celdas según sea necesario -->
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">2</td>
                        <td class="py-2 px-4 border-b">Jane Doe</td>
                        <td class="py-2 px-4 border-b">jane.doe@example.com</td>
                        <!-- Agrega más celdas según sea necesario -->
                    </tr>
                    <!-- ... más filas ... -->
                </tbody>
            </table>
        </div>
    </div>
@endsection

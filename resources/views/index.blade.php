@extends('layouts.app')

@section('titulo')
    Pagina principal
@endsection

@section('contenido')
    <div class="flex justify-center items-center">
        <div class="m-10 p-10 bg-gray-800 text-white font-semibold rounded-lg shadow-md w-[38%]">
            <div class="w-[20%] mx-auto">
                <img src=" {{ asset('img/logo-cecep-footer.png') }}" alt="Logo cecep">
            </div>
            <div class="mt-5 p-5">
                <p class="text-3xl">
                    Fundación Centro Colombiano de Estudios Profesionales
                </p>
            </div>

            <div class="mt-5 ml-5">
                <p>
                    Realizado por:
                </p>
            </div>

            <div class="ml-5 pb-5">
                <p>
                    Miguel Angel Martinez Gomez
                </p>
                <p>
                    Miguel Angel Varela Cataño
                </p>
            </div>
            <div class="ml-5">
                <p>
                    Grupo: S5AN
                </p>
            </div>
            <p class="text-center mt-5">2023</p>
        </div>
    </div>
@endsection

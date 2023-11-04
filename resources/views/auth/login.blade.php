@extends('layouts.app')

@section('titulo')
    Inicia sesión
@endsection

@section('contenido')
    <div class="flex justify-center items-center gap-10 h-[80vh]">
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje'))
                    <p class="flex justify-center text-red-500">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email"
                        class="border p-3  w-full rounded-lg @error('email') border-red-500
                        @enderror hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
                        value="{{ old('email') }} "  />
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Tu contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500
                        @enderror hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500" />
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <div class="mb-5">
                        <input type="checkbox" name="remember"> <label class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                    </div>
                </div>
                <input type="submit" value="Iniciar sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    <h2 class="text-center pt-4 text-gray-500">¿No tienes una cuenta aún? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 hover:underline hover:underline-offset-1">Regístrate</a></h2>
            </form>
        </div>
    </div>
@endsection

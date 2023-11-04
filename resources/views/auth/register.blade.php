@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="flex justify-center items-center gap-10">
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre"
                        class="border p-3  w-full rounded-lg @error('name') border-red-500
                    @enderror hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
                        value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de usuario"
                        class="border p-3  w-full rounded-lg @error('username') border-red-500
                        @enderror hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
                            value="{{ old('username') }}" />
                    @error('username')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email"
                        class="border p-3  w-full rounded-lg @error('email') border-red-500
                        @enderror hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
                            value="{{ old('email') }}" />
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
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirma tu contraseña" class="border p-3  w-full rounded-lg hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500" />
                </div>

                <input type="submit" value="Crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    <h2 class="text-center pt-4 text-gray-500">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 hover:underline hover:underline-offset-1">Inicia sesión</a></h2>
            </form>
        </div>
    </div>
@endsection

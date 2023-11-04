<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lab1 - @yield('titulo')</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-gray-800 shadow">
        @auth
            <nav>
                <div class="container mx-auto">
                    <div class="flex items-center justify-between">
                        <div class="text-white">
                            <a href="/">
                                <h1 class="text-3xl font-bold text-white">
                                    Laboratiorio CRUD
                                </h1>
                            </a>
                        </div>

                        <!-- Menú de Navegación -->
                        <ul class="flex items-center space-x-4">
                            <li>
                                <a href="{{ route('comunascrud') }}"
                                    class="{{ request()->routeIs('comunascrud') ? 'nav-select' : 'nav-unselect' }} ">
                                    Comunas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('municipios.index') }}"
                                    class="{{ request()->routeIs('municipios.index') ? 'nav-select' : 'nav-unselect' }}">
                                    Municipios
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('departamentos.index') }}"
                                    class="{{ request()->routeIs('departamentos.index') ? 'nav-select' : 'nav-unselect' }}">
                                    Departamentos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('paises.index') }}"
                                    class="{{ request()->routeIs('paises.index') ? 'nav-select' : 'nav-unselect' }}">
                                    País
                                </a>
                            </li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="font-bold uppercase text-white text-sm"
                                    href="{{ route('logout') }}">
                                    Cerrar sesión
                                </button>
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        @endauth

        @guest
            <nav class="flex gap-2 justify-between items-center">
                {{-- <div class="flex justify-start"> --}}
                <a href="/">
                    <h1 class="text-3xl font-bold text-white">
                        Laboratiorio CRUD
                    </h1>
                </a>
                {{-- </div> --}}
                <ul class="flex items-center space-x-4">
                    <a class="font-bold uppercase text-white text-sm" href="{{ route('login') }}">Login</a>
                    <h1 class="font-bold uppercase text-white text-sm">|</h1>
                    <a class="font-bold uppercase text-white text-sm" href="{{ route('register') }}">Crear cuenta</a>
                </ul>
            </nav>
        @endguest
    </header>

    <main class="container mx-auto mt-10">
        @yield('contenido')
    </main>
</body>

<script src="{{ asset('js/app.js') }}"></script>

</html>

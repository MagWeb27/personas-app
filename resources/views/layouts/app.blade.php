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
                            <a href="{{ route('comunascrud') }}" class="text-white hover:bg-slate-500 transition duration-100 rounded ">
                                Comunas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('municipios.index') }}" class="text-white hover:bg-slate-500 transition duration-100 rounded">
                                Municipios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('departamentos.index') }}" class="text-white hover:bg-slate-500 transition duration-100 rounded">
                                Departamentos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pais.index') }}" class="text-white hover:bg-slate-500 transition duration-100 rounded">
                                País
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mx-auto mt-10">
        @yield('contenido')
    </main>
</body>

<script src="{{ asset('js/app.js') }}"></script>

</html>

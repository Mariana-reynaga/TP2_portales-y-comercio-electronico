<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>@yield('title')</title>
</head>
<body>
    <x-navbar>
        <x-slot name="title">Wierdo Lamps</x-slot>
    </x-navbar>

    @if (session()->has('feedback'))
        <div class="flex justify-center">
            <div class="w-4/5 flex justify-center">
                <div class="bg-green-500/50 p-6 rounded-md mb-5 font-outfit text-xl w-fit">
                    {!! session()->get('feedback') !!}
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    <div class="min-h-32 mt-10 py-6 flex  justify-center bg-black text-white">
        <div class="w-4/5 flex flex-col lg:flex-row">
            <div class="flex flex-col lg:w-2/3">
                <h3 class="text-xl font-lilita tracking-wide">Lamparas</h3>

                <ul class="font-outfit mt-4 leading-relaxed">
                    <li><a href="{{ route('products.page') }}">Productos</a></li>
                    <li><a href="{{ route('blog.page') }}">Blog</a></li>
                    @guest
                        <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ route('register.form') }}">Crear cuenta</a></li>
                    @endguest
                </ul>
            </div>

            <div class="lg:w-1/3 mt-5 lg:mt-0">
                <h3 class="text-xl font-lilita tracking-wide">Proyecto creado por Mariana Reynaga</h3>
                <ul class="font-outfit mt-4 leading-relaxed">
                    <li>Portales y comercio electronico</li>
                    <li><span class="font-bold">Profesor:</span> Carlos Ferrer</li>
                    <li>DWM4AP</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>

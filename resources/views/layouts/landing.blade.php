<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>Landing</title>
</head>
<body>
    <x-navbar />
    @yield('content')

    <div class="min-h-32 mt-10 py-6 flex justify-center bg-black text-white">
        <div class="w-4/5 flex">
            <div class="flex flex-col w-2/3">
                <h3 class="text-xl font-lilita tracking-wide">Lamparas</h3>

                <ul class="font-outfit mt-4">
                    <li>Productos</li>
                    <li>Blog</li>
                    <li>Iniciar sesión</li>
                    <li>Crear cuenta</li>
                </ul>
            </div>

            <div class="w-1/3">
                <h3 class="text-xl font-lilita tracking-wide">Proyecto creado por Mariana Reynaga</h3>
                <ul class="font-outfit mt-4">
                    <li>Portales y comercio electronico</li>
                    <li><span class="font-bold">Profesor:</span> Carlos Ferrer</li>
                    <li>DWM4AP</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>

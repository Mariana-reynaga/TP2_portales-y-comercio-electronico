<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>Admin - @yield('title')</title>
</head>
<body>
    <main>
        <x-navbar>
            <x-slot name="title">Admin</x-slot>
            <x-slot name="route_home">/admin</x-slot>
            <x-slot name="route_lamps">/admin/lamparas</x-slot>
            <x-slot name="route_blog">/admin/blog</x-slot>
        </x-navbar>

        @yield('content')
    </main>
</body>
</html>

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
    <main>
        <div class="mt-20 flex justify-center">

            <div class="w-3/5 lg:w-2/5 2xl:w-1/3">
                <x-back-btn route="landing.page" />

                <div class="p-6 mt-3 bg-secondary rounded-md shadow-md shadow-secondary/40">
                    <h1 class="text-2xl font-lilita text-black tracking-wide">@yield('title')</h1>
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

</body>
</html>

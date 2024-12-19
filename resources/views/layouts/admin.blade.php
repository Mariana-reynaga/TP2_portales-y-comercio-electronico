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
        <x-navbar-admin />

        @if (session()->has('feedback.admin'))
            <div class="flex justify-center">
                <div class="w-4/5 flex justify-center">
                    <div class="bg-green-500/50 p-6 rounded-md mb-5 font-outfit text-xl w-fit">
                        {!! session()->get('feedback.admin') !!}
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>
</body>

</html>

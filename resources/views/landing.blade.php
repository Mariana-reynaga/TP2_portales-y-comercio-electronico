@extends('layouts.landing')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="text-xl font-lilita tracking-wide">Nuestras lamparas: </h2>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5 flex flex-wrap justify-evenly">
            @for ($x = 0; $x <= 2; $x++)
                <x-product-card>
                    <x-slot name="title">producto</x-slot>
                    <x-slot name="price">2321</x-slot>
                </x-product-card>
            @endfor
        </div>
    </div>

    <div class="mt-10 flex justify-center bg-primary">
        <div class="w-4/5 p-4 flex flex-col lg:flex-row">
            <div class="lg:w-1/2 lg:me-3 flex justify-center">
                <img src="img/lamat.png" alt="" class="w-[500px]">
            </div>

            <div class="lg:w-1/2 px-4 mt-5 lg:ms-3 flex flex-col lg:justify-evenly">
                <h2 class="text-xl font-lilita tracking-wide">Iluminando tu día</h2>

                <div class="font-outfit mt-4 lg:mt-0">
                    <p><strong>Wierdo Lamps</strong> es un negocio único que ofrece lámparas innovadoras y originales para iluminar tu hogar con estilo. Cada pieza combina diseño contemporáneo y un toque de extravagancia, creando un ambiente acogedor y lleno de personalidad. Desde lámparas de mesa hasta sofisticados apliques de pared, en Wierdo Lamps encontrarás la iluminación perfecta que refleje tu carácter y transforme cualquier espacio en un lugar especial. ¡Deja que tu luz brille con un toque raro y encantador!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5 p-4 mt-10 text-center bg-secondary/50 rounded-md">
            <h2 class="text-xl font-lilita tracking-whide">Unite al club</h2>
            <div class="flex justify-center">
                <div class="w-2/3">
                    <p class="font-outfit">Miembros tienen descuentos y ofertas especiales. Además, ¡reciben las últimas noticias sobre nuestra línea de productos! Para obtener estos beneficios y más, ¡crea tu cuenta gratis!</p>
                </div>
            </div>

            <div class="mt-10 mb-4 lg:mt-6">
                <a href="" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base bg-primary rounded-md">Crear cuenta</a>
            </div>
        </div>
    </div>


    <div class="flex justify-center mt-10">
        <div class="w-4/5">
            <h2 class="text-xl font-lilita tracking-wide">Nuestros articulos: </h2>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <div class="w-4/5 flex flex-wrap justify-evenly">
            @for ($x = 0; $x <= 2; $x++)
                <x-blog-card>
                    <x-slot name="title">Blog title</x-slot>
                    <x-slot name="snippet">a snipped of a blog. its incredible what it says!</x-slot>
                </x-blog-card>
            @endfor
        </div>
    </div>
@endsection

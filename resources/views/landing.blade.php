@extends('layouts.landing')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="text-xl font-lilita tracking-wide">Nuestras lamparas: </h2>
        </div>
    </div>

    <div class="flex flex-col items-center">
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
        <div class="w-4/5 p-4 flex">
            <div class="w-1/2 me-3 flex justify-center">
                <img src="img/lamat.png" alt="" class="w-[500px]">
            </div>

            <div class="w-1/2 px-4 ms-3 flex flex-col justify-evenly">
                <h2 class="text-xl font-lilita tracking-wide">Iluminando tu día</h2>

                <div class="font-outfit">
                    <p><strong>Wierdo Lamps</strong> es un negocio único que ofrece lámparas innovadoras y originales para iluminar tu hogar con estilo. Cada pieza combina diseño contemporáneo y un toque de extravagancia, creando un ambiente acogedor y lleno de personalidad. Desde lámparas de mesa hasta sofisticados apliques de pared, en Wierdo Lamps encontrarás la iluminación perfecta que refleje tu carácter y transforme cualquier espacio en un lugar especial. ¡Deja que tu luz brille con un toque raro y encantador!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5 p-4 mt-10 bg-secondary rounded-md"></div>
    </div>
@endsection

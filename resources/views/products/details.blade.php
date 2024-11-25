@extends('layouts.main')
                {{-- Poner var de nombre  --}}
@section('title', 'Detalle')

@section('content')
    <x-back-btn route='products.page' />

    <div class="flex justify-center">

        <div class="w-4/5">
            <div class="flex flex-col-reverse lg:flex-row">
                <div class="lg:w-1/2 mt-5 lg:mt-0 flex flex-col justify-between xl:justify-evenly">
                    <div class="flex lg:flex-col justify-between lg:justify-evenly">
                        <div class="w-1/2 flex flex-col">
                            <h1 class="text-2xl font-lilita text-black tracking-wide">Título Lampara</h1>

                            <h2 class="mt-3 text-lg font-outfit text-black">$ 2354810</h2>
                        </div>

                        <div class="w-1/2 h-1/2 flex flex-col justify-evenly">
                            <p class="font-outfit font-semibold">características:</p>
                            <ul class="font-outfit h-48 flex flex-col justify-evenly">
                                <li class="text-accent">Color: <span class="text-black">Blanco</span>  </li>
                                <li class="text-accent">Material: <span class="text-black">Acero</span></li>
                                <li class="text-accent">Marca: <span class="text-black">Luz de dia</span></li>
                                <li class="text-accent">Altura: <span class="text-black">12 cm</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex justify-center mt-5 lg:mt-0">
                        <a href="" class="px-6 py-2 bg-secondary rounded-md">Comprar</a>
                    </div>
                </div>

                <div class="mt-5 lg:w-1/2 lg:mt-0">
                    <img src="/img/lamat.png" alt="">
                </div>
            </div>
        </div>

    </div>
@endsection

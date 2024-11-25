@extends('landing')

@section('title', 'Lamparas')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="font-lilita text-xl text-black tracking-wide">Nuestras lamparas</h2>

            <div class="flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">
                @for ($x = 0; $x <= 0; $x++)
                    <x-product-card>
                        <x-slot name="title">producto</x-slot>
                        <x-slot name="price">2321</x-slot>
                        <x-slot name="id">23</x-slot>
                    </x-product-card>
                @endfor
            </div>
        </div>
    </div>
@endsection

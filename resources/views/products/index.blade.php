@extends('landing')

@section('title', 'Lamparas')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="font-lilita text-xl text-black tracking-wide">Nuestras lamparas</h2>

            <div class="flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">
                @foreach ( $lamps as $lamp )
                    <x-product-card>
                        <x-slot name="title">{{ $lamp->lamp_name }}</x-slot>
                        <x-slot name="price">{{ $lamp->lamp_price }}</x-slot>
                        <x-slot name="id">{{ $lamp->lamp_id }}</x-slot>
                    </x-product-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection

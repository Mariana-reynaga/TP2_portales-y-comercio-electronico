@extends('layouts.admin')

@section('title', 'Lamparas')

@section('content')
    <div class="flex justify-center mb-10">
        <div class="w-4/5">
            <h1><a href="{{ route('products.create') }}" class="px-8 py-4 mb-10 lg:px-6 lg:py-2 text-xl lg:text-base bg-primary rounded-md">Crear Producto</a></h1>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5">
            <div class="flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">
                @foreach ( $lamparas as $lamp )
                    <x-admin-product-card>
                        <x-slot name="image">{{ $lamp->lamp_image }}</x-slot>
                        <x-slot name="title">{{ $lamp->lamp_name }}</x-slot>
                        <x-slot name="price">{{ $lamp->lamp_price }}</x-slot>
                        <x-slot name="id">{{ $lamp->lamp_id }}</x-slot>
                    </x-admin-product-card>
                @endforeach

            </div>
        </div>
    </div>

@endsection

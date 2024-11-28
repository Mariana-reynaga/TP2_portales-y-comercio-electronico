@extends('layouts.admin')

@section('title', 'detalle compra')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5 flex flex-col">
            <x-back-btn route="admin.users" />

            <h1 class="font-lilita text-2xl text-black tracking-wide" >Compras de {{ $user->user }}</h1>

        </div>
    </div>

    <div class="flex justify-center mt-5">
        <div class="w-4/5 flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">

            @foreach ( $purchases as $purchase )
                <div class="w-full mt-2 p-6 flex flex-col shadow-lg rounded-lg">
                    @foreach ( $purchase as $detail )
                        <p class="mb-2">{{ $detail->product->lamp_name }}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection

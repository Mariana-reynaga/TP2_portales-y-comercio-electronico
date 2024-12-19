@extends('layouts.admin')

@section('title', 'detalle compra')

@section('content')
    <x-back-btn route="admin.users" />

    <div class="flex justify-center">
        <div class="w-4/5">
            <div class="p-10 border border-gray-300 rounded-md font-outfit">
                <div class="pb-2 mb-5 flex justify-between items-center border-b-2 border-slate-300">
                    <h2 class="text-3xl text-black">{{ $user_data->user }}</h2>
                </div>

                <div class="h-16 flex flex-col justify-evenly text-xl xl:text-lg text-black font-outfit">
                    <p><span class="font-bold">Mail:</span> {{ $user_data->email }} </p>
                    <p><span class="font-bold">Dirección:</span> {{ $user_data->user_adress }} </p>
                    <p><span class="font-bold">Télefono:</span> {{ $user_data->user_phone }} </p>
                </div>
            </div>

            <div class="my-5">
                <h2 class="font-outfit text-3xl text-black">Pedidos:</h2>

                <div class="mt-4 flex flex-col items-center lg:grid lg:grid-cols-2 lg:gap-x-5 lg:gap-y-5 2xl:grid-cols-3">
                    @foreach ( $user_orders as $order )
                        <div class="w-full p-6 flex flex-col shadow-lg rounded-lg">
                            <div class="w-full pb-2 mt-3 flex font-outfit border-b-2 border-slate-300">
                                <h3 class="text-xl">Compra #{{ $order->order_id }}</h3>
                            </div>

                            <div class="mt-5 flex flex-col">
                                <p class="mb-3"><span class="font-bold">Dirección de envio:</span> {{ $order->order_adress }}</p>

                                <p class="mb-3"><span class="font-bold">Total:</span> ${{ $order->price_total }} </p>

                                <p class="mb-3"><span class="font-bold">Total:</span> {{ $order->order_status }} </p>

                            </div>

                            <div class="flex flex-col justify-evenly items-center">

                                <a href="{{ route('admin.users.purchase', ['user_id' => $user_data->user_id, 'purchase_id'=>$order->order_id]) }}" class="w-2/3 mb-4 px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base text-center bg-secondary rounded-md">Ver más</a>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="mt-5">
                    {{ $user_orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

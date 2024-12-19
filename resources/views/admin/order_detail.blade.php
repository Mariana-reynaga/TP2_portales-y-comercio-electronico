@extends('layouts.admin')

@section('title', 'Orden')

@section('content')
    <div class="flex justify-center mb-5">
        <div class="w-4/5">
            <a href="{{ route('admin.users.details', ['id'=>$user_data->user_id]) }}" class="text-xl font-lilita text-black tracking-wide">Volver</a>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5">
            <div class="pb-3 border-b-2 border-slate-300 flex justify-between items-end">
                <h2 class="font-outfit text-3xl text-black">Orden #{{ $order->order_id }}</h2>

                @if ($order->order_status != 'Completo' && $order->order_status != 'Cancelado' )
                    <div class="w-2/5 flex justify-between items-center">
                        <form action="{{ route('purchase.cancel', ['user_id' => $user_data->user_id, 'purchase_id'=>$order->order_id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="font-outfit font-bold text-xl lg:text-base text-rose-700">Cancelar compra</button>
                        </form>

                        @if ($order->order_status != 'En camino')
                            <form action="{{ route('purchase.onway', ['user_id' => $user_data->user_id, 'purchase_id'=>$order->order_id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base text-center bg-secondary rounded-md">Marcar en camino</button>
                            </form>

                        @endif

                        <form action="{{ route('purchase.complete', ['user_id' => $user_data->user_id, 'purchase_id'=>$order->order_id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base text-center bg-primary rounded-md">Marcar como completado</button>

                        </form>

                    </div>
                @endif
            </div>

            <div class="mt-5">
                <h3 class="font-outfit font-bold text-xl text-black">Detalles:</h3>

                <div class="mt-3 font-outfit text-lg">
                    <p><span class="text-accent">Nombre del destinatario:</span> {{ $order->reciever_name }} </p>
                    <p><span class="text-accent">Dirección de envio:</span> {{ $order->order_adress }}</p>
                    <p><span class="text-accent">Codigo Postal:</span> {{ $order->order_postal_code }}</p>

                    <p><span class="text-accent">Status:</span> {{ $order->order_status }}</p>
                </div>

                <div class="w-full mt-5 p-4 border border-slate-300 rounded-md">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-3 text-white bg-accent rounded-l-md">Producto</th>
                                <th class="py-3 text-white bg-accent">Precio</th>
                                <th class="py-3 text-white bg-accent rounded-r-md">Cantidad</th>
                            </tr>
                        </thead>

                        <tbody class="mt-5">
                            @foreach ($products as $item)
                                <tr>
                                    <td class="text-center text-lg">{{ $item->product->lamp_name }}</td>
                                    <td class="text-center text-lg">$ {{ number_format($item->product->lamp_price, 2, '.', ',') }}</td>
                                    <td class="text-center text-lg">{{ $item->order_items_qnty }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex justify-end mt-5">
                        <p class="text-2xl"><span class="font-outfit font-bold text-black">Total:</span> {{ $order->price_total }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

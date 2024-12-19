@extends('layouts.main')

@section('title', 'Checkout')

@section('content')
    <x-back-btn route="cart" />

    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="pb-2 mb-4 font-outfit text-3xl text-black border-b-2 border-gray-300">Checkout</h2>

                                    {{-- se cambio estooo --}}
            <form action="{{ route('mercadopago.index') }}" method="POST">
                @csrf

                <div class="flex">
                    <div class="w-2/3">
                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">reciever_name</x-slot>
                                <x-slot name="label">Nombre y apellido del destinatario</x-slot>
                                <x-slot name="type">string</x-slot>
                                {{ $user->user }}
                            </x-edit-form-component>

                            @error('reciever_name')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-3/4 flex justify-between">
                            <div class="">
                                <x-edit-form-component>
                                    <x-slot name="dbCol">order_adress</x-slot>
                                    <x-slot name="label">Dirección</x-slot>
                                    <x-slot name="type">string</x-slot>
                                    {{ $user->user_adress }}
                                </x-edit-form-component>

                                @error('order_adress')
                                    <div class="mt-2 text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <x-form-component>
                                    <x-slot name="dbCol">order_postal_code</x-slot>
                                    <x-slot name="label">Codigo postal</x-slot>
                                    <x-slot name="type">number</x-slot>
                                </x-form-component>

                                @error('order_postal_code')
                                    <div class="mt-2 text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="">
                            <div class="mt-3 flex flex-col font-outfit">
                                <label for="order_notes" class="mt-3 mb-2">Notas</label>
                                <textarea name="order_notes" id="order_notes" cols="30" rows="3" class="p-2 rounded-md border-2"></textarea>
                            </div>

                            @error('order_notes')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-1/3 p-4 ms-3 flex flex-col justify-between border border-slate-300 rounded-md">
                        <div class="flex flex-col">
                            @foreach ($items as $product )
                                <div class="mb-3 flex justify-between">
                                    <p>{{ $product->name }}</p>
                                    <p><span class="font-semibold">cant:</span> {{ $product->qty }}</p>
                                    <p class="font-semibold">${{ number_format($product->price*$product->qty, 0 , "," , ".") }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="w-full flex flex-col">
                            <p class="mb-3 font-bold">Total: ${{ Cart::instance('cart')->subtotal() }}</p>

                            <div id="mercadopago-button"></div>

                            <script src="https://sdk.mercadopago.com/js/v2"></script>
                            <script>
                                const mp = new MercadoPago('<?= $mpPublicKey;?>');

                                mp.bricks().create('wallet', 'mercadopago-button', {
                                    initialization: {
                                        preferenceId: '<?= $preference->id;?>',
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

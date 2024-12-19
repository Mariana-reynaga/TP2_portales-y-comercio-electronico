@extends('layouts.main')

@section('title', 'Carrito')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="pb-2 font-outfit text-3xl text-black border-b-2 border-gray-300">Carrito</h2>

            <div class="p-4 mt-5 border-2 border-gray-300 rounded-md">
                @if ($items->count() > 0)
                    <div class="flex justify-end">
                        <h3 class="text-xl"><span class="font-bold">Total:</span> ${{ Cart::instance('cart')->subtotal() }}</h3>
                    </div>

                    @foreach ($items as $product)
                        <div class="p-4 my-3 rounded-md shadow-md">
                            <div class="flex justify-center">
                                <div class="w-4/5 flex justify-between items-center">
                                    <h3>{{ $product->name }}</h3>

                                    <div class="flex items-center">
                                        <form action="{{ route('cart.increase', ['rowId'=>$product->rowId]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="px-4 text-xl">
                                                +
                                            </button>
                                        </form>

                                        <p>{{ $product->qty }}</p>

                                        <form action="{{ route('cart.decrease', ['rowId'=>$product->rowId]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="px-4 text-xl">
                                                -
                                            </button>
                                        </form>
                                    </div>

                                    <p class="text-slate-500">${{ number_format($product->price, 0 , "," , ".") }}</p>

                                    <p><span class="font-bold">Subtotal:</span> ${{ number_format($product->price*$product->qty, 0 , "," , ".") }}</p>

                                    {{-- Eliminar un producto del carrito --}}
                                    <form action="{{ route('cart.remove', ['rowId'=>$product->rowId]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-6 py-2 border-2 text-rose-500 border-rose-500 rounded-md">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- vaciar el carrito --}}
                    <div class="flex justify-end items-center">
                        <form action="{{ route('cart.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-outfit text-lg text-rose-500">Vaciar Carrito</button>
                        </form>

                        <a href="{{ route('cart.checkout') }}" class="ms-5 px-6 py-2 bg-primary rounded-md">Proceder con la compra</a>
                    </div>
                @else
                    <div class="">
                        <p class="font-outfit mb-5">Nada que ver por aca</p>
                        <a href="{{ route('products.page') }}" class="px-6 py-2 bg-primary rounded-md">Ver productos</a>
                    </div>

                @endif
            </div>
        </div>
    </div>

@endsection

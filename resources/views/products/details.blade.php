@extends('layouts.main')

@section('title', $product->lamp_name)

@section('content')
    <x-back-btn route='products.page' />

    <div class="flex justify-center">

        <div class="w-4/5">
            <div class="flex flex-col-reverse lg:flex-row">
                <div class="lg:w-1/2 mt-5 lg:mt-0 flex flex-col justify-between xl:justify-evenly">
                    <div class="flex lg:flex-col justify-between lg:justify-evenly">
                        <div class="w-1/2 flex flex-col">
                            <h1 class="text-2xl font-lilita text-black tracking-wide">{{ $product->lamp_name }}</h1>

                            <h2 class="mt-3 text-lg font-outfit text-black">$ {{ $product->lamp_price }}</h2>
                        </div>

                        <div class="w-1/2 h-1/2 flex flex-col justify-evenly">
                            <p class="font-outfit font-semibold">características:</p>
                            <ul class="font-outfit h-48 flex flex-col justify-evenly">
                                <li class="text-accent">Color: <span class="text-black">{{ $product->color->color_name }}</span>  </li>
                                <li class="text-accent">Material: <span class="text-black">{{ $product->material->material_name }}</span></li>
                                <li class="text-accent">Marca: <span class="text-black">{{ $product->brand->brand_name }}</span></li>
                                <li class="text-accent">Altura: <span class="text-black">{{ $product->lamp_height }} cm</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex justify-center mt-5 lg:mt-0">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="number" name="qnty" id="qnty" class="w-12 p-2 me-2 rounded-md border-2" value="1" min="1">

                            <input type="hidden" name="lamp_id" value="{{$product->lamp_id}}">
                            <input type="hidden" name="lamp_name" value="{{$product->lamp_name}}">
                            <input type="hidden" name="lamp_price" value="{{$product->lamp_price}}">


                            <button type="submit" class="px-6 py-2 font-bold bg-secondary rounded-md">Agregar al carrito</button>
                        </form>
                    </div>
                </div>

                <div class="mt-5 lg:w-1/2 lg:mt-0">
                    <img src="{{ Storage::url($product->lamp_image) }}" alt="" class="shadow-md">
                </div>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.main')

@section('title', 'Perfil')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <div class="p-4 border border-gray-300 rounded-md font-outfit">
                <div class="pb-2 mb-5 flex justify-between items-center border-b-2 border-slate-300">
                    <h2 class="text-3xl text-black">{{ $user_data->user }}</h2>
                    <a href="{{ route('perfil.edit', ['id'=>$user_data->user_id]) }}" class="text-xl xl:text-base font-semibold text-accent">Editar</a>
                </div>

                <div class="h-16 flex flex-col justify-evenly text-xl xl:text-lg text-black font-outfit">
                    <p><span class="font-bold">Mail:</span> {{ $user_data->email }} </p>
                    <p><span class="font-bold">Dirección:</span> {{ $user_data->user_adress }} </p>
                </div>
            </div>

            <div class="my-5">
                <h2 class="font-outfit text-3xl text-black">Pedidos:</h2>

                <div class="mt-4 flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">
                    @for ($x = 0; $x <= 2; $x ++ )
                        <div class="min-h-64 w-full p-6 flex justify-evenly shadow-lg rounded-lg">
                            <div class="mt-3 flex flex-col justify-evenly font-outfit">
                                <h3 class="text-xl">compra</h3>

                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection

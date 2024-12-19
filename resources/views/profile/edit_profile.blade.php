@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')
    <div class="flex justify-center mb-5">
        <div class="w-4/5">
            <a href="{{ route('perfil', ['id'=>$user_data->user_id]) }}" class="text-xl font-lilita text-black tracking-wide">Volver</a>
        </div>
    </div>

    <div class="lg:h-dvh flex justify-center">
        <div class="w-4/5 font-outfit">
            <h2 class="font-outfit text-3xl text-black">Editar Perfil</h2>

            <form action="{{ route('perfil.edit.process', ['id'=>$user_data->user_id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="lg:flex lg:justify-evenly">
                    <div class="lg:w-1/2 lg:me-2 lg:flex lg:flex-col">
                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">user</x-slot>
                                <x-slot name="label">Nombre</x-slot>
                                <x-slot name="type">text</x-slot>
                                {{ $user_data->user }}
                            </x-edit-form-component>

                            @error('user')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">email</x-slot>
                                <x-slot name="label">Email</x-slot>
                                <x-slot name="type">email</x-slot>
                                {{ $user_data->email }}
                            </x-edit-form-component>

                            @error('email')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="lg:w-1/2 lg:me-2 lg:flex lg:flex-col">
                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">user_adress</x-slot>
                                <x-slot name="label">Dirección de envio</x-slot>
                                <x-slot name="type">text</x-slot>
                                {{ $user_data->user_adress }}
                            </x-edit-form-component>

                            @error('user_adress')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="">
                            <div class="mt-3 flex flex-col font-outfit">
                                <label for="user_phone" class="mt-3 mb-2">Número de telefono</label>
                                <input type="tel" name="user_phone" id="user_phone" pattern="{0-9}[8]" value="{{ old("user_phone", $user_data->user_phone) }}" class="p-2 rounded-md border-2">
                            </div>

                            @error('user_phone')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="mt-5">
                    <button class="px-6 py-2 bg-primary rounded-md" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

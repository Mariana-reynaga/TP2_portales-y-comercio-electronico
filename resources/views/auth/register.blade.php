@extends('layouts.auth')

@section('title', 'Crear cuenta')

@section('content')
    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <div class="">
            <x-label-and-input>
                <x-slot name="dbCol">user</x-slot>
                <x-slot name="label">Nombre</x-slot>
                <x-slot name="type">text</x-slot>
            </x-label-and-input>

            @error('user')
                <div class="mt-2 p-2 text-white bg-red-500/70 rounded-md"> {{ $message }} </div>
            @enderror
        </div>

        <div class="">
            <x-label-and-input>
                <x-slot name="dbCol">email</x-slot>
                <x-slot name="label">Email</x-slot>
                <x-slot name="type">email</x-slot>
            </x-label-and-input>

            @error('email')
                <div class="mt-2 p-2 text-white bg-red-500/70 rounded-md"> {{ $message }} </div>
            @enderror
        </div>

        <div class="">
            <x-label-and-input>
                <x-slot name="dbCol">password</x-slot>
                <x-slot name="label">Contraseña</x-slot>
                <x-slot name="type">password</x-slot>

                @error('password')
                    <div class="mt-2 p-2 text-white bg-red-500/70 rounded-md"> {{ $message }} </div>
                @enderror
            </x-label-and-input>

        </div>

        <div class="flex justify-center mt-10">
            <button type="submit" class="px-6 py-2 bg-accent text-white rounded-md">Registrate</button>
        </div>
    </form>

    <div class="flex justify-center mt-10">
        <div class="1/3">
            <a href="/iniciar" class="font-outfit underline underline-offset-4">¿Ya tenes cuenta? Inicia sesión</a>
        </div>
    </div>
@endsection

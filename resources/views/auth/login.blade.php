@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')
    <form action="{{ route('login.process') }}" method="POST">
        @csrf

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
            </x-label-and-input>

            @error('password')
                <div class="mt-2 p-2 text-white bg-red-500/70 rounded-md"> {{ $message }} </div>
            @enderror
        </div>

        <div class="flex justify-center mt-10">
            <button type="submit" class="px-6 py-2 bg-accent text-white rounded-md">Iniciar sesión</button>
        </div>
    </form>

    <div class="flex justify-center mt-10">
        <div class="1/3">
            <a href="/crear" class="font-outfit underline underline-offset-4">¿No tenes cuenta? Registrate</a>
        </div>
    </div>
@endsection

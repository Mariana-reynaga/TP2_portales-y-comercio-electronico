@extends('layouts.auth')

@section('title', 'Crear cuenta')

@section('content')
    <form action="">
        <x-label-and-input>
            <x-slot name="dbCol">email</x-slot>
            <x-slot name="label">Email</x-slot>
            <x-slot name="type">email</x-slot>
        </x-label-and-input>

        <x-label-and-input>
            <x-slot name="dbCol">password</x-slot>
            <x-slot name="label">Contraseña</x-slot>
            <x-slot name="type">password</x-slot>
        </x-label-and-input>

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

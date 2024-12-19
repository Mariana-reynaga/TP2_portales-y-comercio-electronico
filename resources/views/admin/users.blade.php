@extends('layouts.admin')

@section('title','users')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h1 class="font-lilita text-2xl text-black tracking-wide" >usuarios</h1>
        </div>
    </div>

    <div class="flex justify-center mt-10">
        <div class="w-4/5 flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">
            @foreach ( $usuarios as $user )
                <div class="w-full p-6 flex flex-col shadow-lg rounded-lg">

                    <h2 class="font-outfit text-xl text-black"> {{ $user->user }}</h2>

                    <a href="{{ route('admin.users.details', ['id'=>$user->user_id]) }}" class="w-fit px-8 py-4 mt-5 lg:px-6 lg:py-2 text-xl lg:text-base bg-secondary rounded-md">Ver</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

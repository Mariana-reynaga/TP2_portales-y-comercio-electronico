@extends('layouts.main')

@section('title', 'Blog')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="font-lilita text-xl text-black tracking-wide">Nuestro Blog</h2>

            <div class="flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">
                @foreach ( $blogs as $blog )
                    <x-blog-card>
                        <x-slot name="title">{{ $blog->blog_title }}</x-slot>
                        <x-slot name="snippet">{{ $blog->blog_article }}</x-slot>
                        <x-slot name="id">{{ $blog->blog_id }}</x-slot>
                    </x-blog-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection

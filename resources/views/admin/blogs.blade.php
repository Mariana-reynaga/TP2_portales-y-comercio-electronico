@extends('layouts.admin')

@section('title', 'Blogs')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/5">
            <h1><a href="{{ route('blog.create') }}" class="px-8 py-4 mb-10 lg:px-6 lg:py-2 text-xl lg:text-base bg-primary rounded-md">Crear Blog</a></h1>

            <div class="flex flex-col items-center md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 lg:grid-cols-3">
                @foreach ( $blogs as $blog )
                    <x-admin-blog-card>
                        <x-slot name="title">{{ $blog->blog_title }}</x-slot>
                        <x-slot name="snippet">{{ $blog->blog_article }}</x-slot>
                        <x-slot name="id">{{ $blog->blog_id }}</x-slot>
                    </x-admin-blog-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection

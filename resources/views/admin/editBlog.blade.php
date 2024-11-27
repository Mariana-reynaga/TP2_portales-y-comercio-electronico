@extends('layouts.admin')

@section('title', 'Crear Blog')

@section('content')
    <x-back-btn route='admin.blogs' />

    <div class="flex justify-center">
        <div class="w-4/5">
            <h1 class="font-lilita text-xl text-black tracking-wide">Crear Blog</h1>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5">
            <form action="{{ route('blog.edit.process', ['id'=>$blog->blog_id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="">
                    <x-edit-form-component>
                        <x-slot name="dbCol">blog_title</x-slot>
                        <x-slot name="label">Título</x-slot>
                        <x-slot name="type">text</x-slot>
                        {{ $blog->blog_title }}
                    </x-edit-form-component>

                    @error('blog_title')
                        <div class="mt-2 text-red-500"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="">
                    <x-edit-form-component>
                        <x-slot name="dbCol">blog_author</x-slot>
                        <x-slot name="label">Autor</x-slot>
                        <x-slot name="type">text</x-slot>
                        {{ $blog->blog_author }}
                    </x-edit-form-component>

                    @error('blog_author')
                        <div class="mt-2 text-red-500"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="">
                    <div class="mt-3 flex flex-col font-outfit">
                        <label for="blog_article" class="mt-3 mb-2" class="mt-3 mb-2">Artículo</label>
                        <textarea name="blog_article" id="blog_article" cols="30" rows="10" class="p-2 rounded-md border-2">{{ old('blog_article', $blog->blog_article) }}</textarea>
                    </div>

                    @error('blog_article')
                        <div class="mt-2 text-red-500"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="mt-5">
                    <button class="px-6 py-2 bg-primary rounded-md" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

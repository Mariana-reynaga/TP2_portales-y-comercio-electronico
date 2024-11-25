@extends('layouts.main')
                {{-- poner el titulo --}}
@section('title', $article->blog_title)

@section('content')
    <x-back-btn route="blog.page" />

    <div class="flex justify-center">
        <div class="w-4/5">
            <h2 class="text-3xl font-lilita text-black tracking-wide">{{ $article->blog_title }}</h2>
            <div class="w-2/3 lg:w-1/4 mt-5 lg:mt-2 flex justify-between items-center font-outfit text-black">
                <h3>{{ $article->blog_author }}</h3>
                <p>{{ $article->created_at->format('d/m/Y') }}</p>
            </div>

            <div class="w-3/4 mt-6 lg:mt-5">
                {!! nl2br($article->blog_article) !!}
            </div>
        </div>
    </div>
@endsection

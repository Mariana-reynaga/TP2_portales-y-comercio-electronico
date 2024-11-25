<div class="md:w-2/5 lg:w-1/4 xl:w-[30%] p-6 shadow-lg rounded-lg">
    <div class="mt-3 flex flex-col justify-evenly font-outfit">
        <h3 class="text-xl">{{ $title }}</h3>

        <p class="text-sm">{!! Str::limit($snippet, 54) !!}</p>

        <div class="flex justify-center mt-2">
            <a href="{{ route('blog.article', ['id'=>$id]) }}" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base bg-secondary rounded-md">Leer</a>
        </div>
    </div>
</div>

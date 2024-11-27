<div class="min-h-64 w-full p-6 flex justify-evenly shadow-lg rounded-lg">
    <div class="mt-3 flex flex-col justify-evenly font-outfit">
        <h3 class="text-xl">{{ $title }}</h3>

        <p class="text-sm">{!! Str::limit($snippet, 54) !!}</p>

        <div class="mt-2 flex justify-evenly items-center">
            <form action="{{ route('blog.delete.process', ['id'=>$id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base  text-white bg-red-500 rounded-md">Eliminar</button>
            </form>

            <a href="{{ route('blog.edit', ['id'=>$id]) }}" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base border-2 border-secondary rounded-md">Editar</a>

            <a href="{{ route('admin.blogs.detail', ['id'=>$id]) }}" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base bg-secondary rounded-md">Ver</a>
        </div>
    </div>
</div>

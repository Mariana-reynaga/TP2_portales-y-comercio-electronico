<div class="h-max p-6 shadow-lg rounded-lg">
    <img src="{{ $image }}" alt="" class="w-full">

    <div class="lg:h-24 mt-3 flex flex-col justify-evenly font-outfit">
        <h3 class="text-2xl lg:text-xl">{{ $title }}</h3>

        <p class="text-xl lg:text-base">${{ $price }}</p>

        <div class="flex justify-evenly mt-2">
            <form action="{{ route('products.delete.process', ['id'=>$id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base  text-white bg-red-500 rounded-md">Eliminar</button>
            </form>

            <a href="{{ route('products.edit', ['id'=>$id]) }}" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base border-2 border-secondary rounded-md">Editar</a>

        </div>
    </div>
</div>

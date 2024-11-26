<div class="h-max p-6 shadow-lg rounded-lg">
    <img src="{{ $image }}" alt="" class="w-full">

    <div class="lg:h-24 mt-3 flex flex-col justify-evenly font-outfit">
        <h3 class="text-2xl lg:text-xl">{{ $title }}</h3>

        <p class="text-xl lg:text-base">${{ $price }}</p>

        <div class="flex justify-center mt-2">
            <a href="{{ route('products.detail', ['id'=>$id]) }}" class="px-8 py-4 lg:px-6 lg:py-2 text-xl lg:text-base bg-secondary rounded-md">Ver más</a>
        </div>
    </div>
</div>

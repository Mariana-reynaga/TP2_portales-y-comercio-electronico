<div>
    <div class="w-full min-h-20 mb-10 flex justify-center shadow-md shadow-primary/30 rounded-b-lg">
        <div class="w-4/5 flex justify-between items-center">
            <h1 class="text-3xl font-lilita tracking-wide text-accent"><a href="{{ $route_home }}">{{ $title }}</a></h1>

            <ul class="w-1/3 flex justify-between items-center text-xl font-outfit text-black">
                <li><a href="{{ $route_lamps }}">Productos</a></li>
                <li><a href="{{ $route_blog }}">Blog</a></li>



                @guest
                    <li><a href="/iniciar">Iniciar sesión</a></li>
                @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <div class="flex">
                            <p class="me-4">{{ auth()->user()->user }}</p>
                            <button type="submit">Cerrar sesión</button>
                        </div>
                    </form>


                @endguest
            </ul>
        </div>
    </div>
</div>

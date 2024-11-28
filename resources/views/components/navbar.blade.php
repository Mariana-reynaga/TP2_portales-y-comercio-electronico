<div>
    <div class="w-full min-h-20 mb-10 flex justify-center shadow-md shadow-primary/30 rounded-b-lg">
        <div class="w-4/5 flex justify-between items-center">
            <h1 class="text-3xl font-lilita tracking-wide text-accent"><a href="{{ $route_home }}">{{ $title }}</a></h1>

            <ul class="w-1/4 flex justify-between items-center text-xl font-outfit text-black">
                <li><a href="{{ $route_lamps }}">Productos</a></li>
                <li><a href="{{ $route_blog }}">Blog</a></li>

                @guest
                    <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                @else
                    @if (auth()->user()->user_role == 'admin')
                        <li><a href="{{ route('admin.users') }}">Usuarios</a></li>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit">Cerrar sesión</button>
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</div>

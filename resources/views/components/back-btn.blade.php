<div class="flex justify-center mb-5">
    <div class="w-4/5">
        <a {{ request()->routeIs($route) ? 'active' : '' }} href="{{ route($route) }}" class="text-xl font-lilita text-black tracking-wide">Volver</a>
    </div>
</div>

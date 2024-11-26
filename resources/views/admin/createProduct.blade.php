@extends('layouts.admin')

@section('title', 'Crear')

@section('content')
    <x-back-btn route='admin.products' />

    <div class="flex justify-center">
        <div class="w-4/5">
            <h1 class="font-lilita text-xl text-black tracking-wide">Crear producto</h1>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5">
            <form action="{{ route('products.create.process') }}" method="POST">
                @csrf

                <div class="flex justify-evenly">
                    <div class="w-2/5">
                        <div class="">
                            <x-form-component>
                                <x-slot name="dbCol">lamp_name</x-slot>
                                <x-slot name="label">Nombre del producto</x-slot>
                                <x-slot name="type">text</x-slot>
                            </x-form-component>

                            @error('lamp_name')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="">
                            <x-form-component>
                                <x-slot name="dbCol">lamp_price</x-slot>
                                <x-slot name="label">Precio</x-slot>
                                <x-slot name="type">number</x-slot>
                            </x-form-component>

                            @error('lamp_price')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="">
                            <x-form-component>
                                <x-slot name="dbCol">lamp_stock</x-slot>
                                <x-slot name="label">Stock</x-slot>
                                <x-slot name="type">number</x-slot>
                            </x-form-component>

                            @error('lamp_stock')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-2/5">
                        <div class="">
                            <x-form-component>
                                <x-slot name="dbCol">lamp_height</x-slot>
                                <x-slot name="label">Altura</x-slot>
                                <x-slot name="type">number</x-slot>
                            </x-form-component>

                            @error('lamp_height')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mt-3 flex flex-col">
                            <label for="color_fk" class="mt-3 mb-2">Color</label>
                            <select name="color_fk" id="color_fk" class="p-2 rounded-md border-2">
                                <option value="">Elegir un color</option>
                                @foreach ( $colors as $color )
                                    <option value="{{ $color->color_id }}" @selected($color->color_id == old('color_fk'))>{{ $color->color_name }}</option>
                                @endforeach
                            </select>

                            @error('color_fk')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mt-3 flex flex-col">
                            <label for="material_fk" class="mt-3 mb-2">Material</label>
                            <select name="material_fk" id="material_fk" class="p-2 rounded-md border-2">
                                <option value="">Elegir un material</option>
                                @foreach ( $materials as $material )
                                    <option value="{{ $material->material_id }}" @selected($material->material_id == old('material_fk')) >{{ $material->material_name }}</option>
                                @endforeach
                            </select>

                            @error('material_fk')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mt-3 flex flex-col">
                            <label for="brand_fk" class="mt-3 mb-2">Marca</label>
                            <select name="brand_fk" id="brand_fk" class="p-2 rounded-md border-2">
                                <option value="">Elegir una marca</option>
                                @foreach ( $brands as $brand )
                                    <option value="{{ $brand->brand_id }}" @selected($brand->brand_id == old('brand_fk')) >{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>

                            @error('brand_fk')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mt-5">
                    <button class="px-6 py-2 bg-primary rounded-md" type="submit">crear</button>
                </div>

            </form>

        </div>
    </div>

@endsection

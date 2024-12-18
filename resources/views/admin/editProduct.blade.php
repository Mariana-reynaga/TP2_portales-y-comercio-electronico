@extends('layouts.admin')

@section('title', 'Editar')

@section('content')
    <x-back-btn route='admin.products' />

    <div class="flex justify-center">
        <div class="w-4/5">
            <h1 class="font-lilita text-xl text-black tracking-wide">Editar {{ $product->lamp_name }}</h1>
        </div>
    </div>

    <div class="flex justify-center mb-10">
        <div class="w-4/5">
            <form action="{{ route('products.edit.process', ['id'=>$product->lamp_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <div class="flex justify-evenly">
                    <div class="w-2/5">
                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">lamp_name</x-slot>
                                <x-slot name="label">Nombre del producto</x-slot>
                                <x-slot name="type">text</x-slot>
                                {{ $product->lamp_name }}
                            </x-edit-form-component>

                            @error('lamp_name')
                                <div class="mt-2 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">lamp_price</x-slot>
                                <x-slot name="label">Precio</x-slot>
                                <x-slot name="type">number</x-slot>
                                {{ $product->lamp_price }}
                            </x-edit-form-component>

                            @error('lamp_price')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">lamp_stock</x-slot>
                                <x-slot name="label">Stock</x-slot>
                                <x-slot name="type">number</x-slot>
                                {{ $product->lamp_stock }}
                            </x-edit-form-component>

                            @error('lamp_stock')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="">
                            <div class="w-full flex justify-center">
                                <img class="w-1/3 mt-3" src="{{ Storage::url($product->lamp_image) }}" alt="">
                            </div>

                            <input type="hidden" name="lamp_old_image" value="{{ $product->lamp_image }}">

                            <x-edit-form-component>
                                <x-slot name="dbCol">lamp_image</x-slot>
                                <x-slot name="label">Imagen</x-slot>
                                <x-slot name="type">file</x-slot>
                            </x-edit-form-component>

                            @error('lamp_image')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">lamp_image_alt</x-slot>
                                <x-slot name="label">Descripción de la imagen</x-slot>
                                <x-slot name="type">text</x-slot>
                                {{ $product->lamp_image_alt }}
                            </x-edit-form-component>

                            @error('lamp_image_alt')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-2/5">
                        <div class="">
                            <x-edit-form-component>
                                <x-slot name="dbCol">lamp_height</x-slot>
                                <x-slot name="label">Altura</x-slot>
                                <x-slot name="type">number</x-slot>
                                {{ $product->lamp_height }}
                            </x-edit-form-component>

                            @error('lamp_height')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mt-3 flex flex-col">
                            <label for="color_fk" class="mt-3 mb-2">Color</label>
                            <select name="color_fk" id="color_fk" class="p-2 rounded-md border-2">
                                <option value="">Elegir un color</option>
                                @foreach ( $colors as $color )
                                    <option value="{{ $color->color_id }}" @selected($color->color_id == old('color_fk', $product->color_fk))>{{ $color->color_name }}</option>
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
                                    <option value="{{ $material->material_id }}" @selected($material->material_id == old('material_fk', $product->material_fk)) >{{ $material->material_name }}</option>
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
                                    <option value="{{ $brand->brand_id }}" @selected($brand->brand_id == old('brand_fk', $product->brand_fk)) >{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>

                            @error('brand_fk')
                                <div class="mt-2 text-red-500"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mt-5 flex justify-center">
                    <button class="px-6 py-2 bg-primary rounded-md" type="submit">Guardar</button>
                </div>

            </form>
        </div>
    </div>
@endsection

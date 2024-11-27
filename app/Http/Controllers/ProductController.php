<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// NO ELIMINAR
use App\Models\Blog;
use App\Models\Lamparas;

use App\Models\Material;
use App\Models\Marca;
use App\Models\Color;

class ProductController extends Controller
{
    public function products(){
        // no se porque llama al landing cuando vas a productos, pero si sacas esto se rompe.
        $threeRandomBlogs = Blog::inRandomOrder()->limit(3)->get();
        $threeRandomLamps = Lamparas::inRandomOrder()->limit(3)->get();

        $products = Lamparas::all();

        return view('products.index',[
            'lamps' => $products,
            'random_blogs' => $threeRandomBlogs,
            'random_lamps' => $threeRandomLamps
        ]);
    }

    public function productDetail(int $id){
        $product = Lamparas::find($id);

        return view('products.details', [
            'product' => $product
        ]);
    }

    public function adminProducts(){
        $products = Lamparas::all();

        return view('admin.products', [
            'lamparas' => $products
        ]);
    }

    public function adminDetail(int $id){
        $product = Lamparas::find($id);

        return view('admin.detailsProduct', [
            'product' => $product
        ]);
    }

    public function productCreate(){
        $colors = Color::all();
        $materials = Material::all();
        $brands = Marca::all();

        return view('admin.createProduct', [
            'colors'    => $colors,
            'materials' => $materials,
            'brands'    => $brands
        ]);
    }

    public function createProcess(Request $req){
        $req->validate(
            [
                'lamp_name'     => 'required | min:10   | max:30'               ,
                'lamp_price'    => 'required | numeric  | min:2500'             ,
                'lamp_height'   => 'required | numeric  | min:10    |max: 1000' ,
                'lamp_stock'    => 'required | numeric  | min:0'                ,
                'brand_fk'      => 'required'                                   ,
                'color_fk'      => 'required'                                   ,
                'material_fk'   => 'required'                                   ,
                'lamp_image'    => 'required'
            ],
            [
                'lamp_name.required'    => 'El nombre es requerido.',
                'lamp_name.min'         => 'El nombre debe tener un minimo de 10 caracteres.',
                'lamp_name.max'         => 'El nombre debe tener un maximo de 30 caracteres.',
                // //
                'lamp_price.required'   => 'El precio es requerido.',
                'lamp_price.numeric'    => 'El precio debe ser numerico.',
                'lamp_price.min'        => 'El precio debe ser como minimo $2500.',
                // //
                'lamp_height.required'  => 'La altura es requerida.',
                'lamp_height.numeric'   => 'La altura debe ser numerico.',
                'lamp_height.min'       => 'La altura debe ser como minimo 10 cm.',
                'lamp_height.max'       => 'La altura debe ser como maximo 1000 cm.',
                // //
                'lamp_stock.required'   => 'El stock es requerido.',
                'lamp_stock.numeric'    => 'El stock debe ser numerico.',
                'lamp_stock.min'        => 'El stock debe ser como minimo 0.',
                ////
                'brand_fk.required'     => 'La marca es requerida.',
                'color_fk.required'     => 'El color es requerido.',
                'material_fk.required'  => 'El material es requerido.',
                ////
                'lamp_image.required'   => 'La imagen es requerida.'
            ]
        );

        $input = $req->all([]);

        $input['lamp_image'] = $req->file('lamp_image')->store('images', 'public');

        Lamparas::create($input);

        return redirect()->route('admin.products');
    }

    public function productEdit(int $id){
        $colors = Color::all();
        $materials = Material::all();
        $brands = Marca::all();

        $product = Lamparas::find($id);

        return view('admin.editProduct', [
            'colors'    => $colors,
            'materials' => $materials,
            'brands'    => $brands,
            'product'   => $product
        ]);
    }

    public function editProcess(Int $id, Request $req){
        $req->validate(
            [
                'lamp_name'     => 'required | min:10   | max:30',
                'lamp_price'    => 'required | numeric  | min:2500',
                'lamp_height'   => 'required | numeric  |max: 1000',
                'lamp_stock'    => 'required | numeric  | min:0',
                'brand_fk'      => 'required',
                'color_fk'      => 'required',
                'material_fk'   => 'required'
            ],
            [
                'lamp_name.required' => 'El nombre es requerido.',
                'lamp_name.min' => 'El nombre debe tener un minimo de 10 caracteres.',
                'lamp_name.max' => 'El nombre debe tener un maximo de 30 caracteres.',
                // //
                'lamp_price.required' => 'El precio es requerido.',
                'lamp_price.numeric' => 'El precio debe ser numerico.',
                'lamp_price.min' => 'El precio debe ser como minimo $2500.',
                // //
                'lamp_height.required' => 'La altura es requerida.',
                'lamp_height.numeric' => 'La altura debe ser numerico.',
                'lamp_height.max' => 'La altura debe ser como maximo 1000 cm.',
                // //
                'lamp_stock.required' => 'El stock es requerido.',
                'lamp_stock.numeric' => 'El stock debe ser numerico.',
                'lamp_stock.min' => 'El stock debe ser como minimo 0.',
                ////
                'brand_fk.required'=>'La marca es requerida.',
                'color_fk.required'=>'El color es requerido.',
                'material_fk.required'=>'El material es requerido.',
            ]
        );

        $product = Lamparas::findOrFail($id);

        $input = $req->all([]);

        $oldImage = $product->lamp_image;

        if ($req->hasFile('lamp_image')) {
            $input['lamp_image'] = $req->file('lamp_image')->store('images', 'public');

            Storage::disk('public')->delete($oldImage);
        }

        $product->update($input);

        return redirect()->route('admin.products');
    }

    public function deleteProcess(Int $id, Request $req){
        $product = Lamparas::findOrFail($id);

        $product_image = $product->lamp_image;

        Storage::disk('public')->delete($product_image);

        $product->delete();

        return redirect()->route('admin.products');
    }
}

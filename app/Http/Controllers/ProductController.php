<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Lamparas;
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
}

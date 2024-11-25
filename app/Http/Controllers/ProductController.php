<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        return view('products.index');
    }

    public function productDetail(int $id){
        return view('products.details');
    }
}

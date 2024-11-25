<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::all();

        return view('blog.index', [
            'blogs' => $blogs
        ]);
    }

    public function article(int $id){
        $article = Blog::find($id);

        return view('blog.article', [
            'article' => $article
        ]);
    }
}

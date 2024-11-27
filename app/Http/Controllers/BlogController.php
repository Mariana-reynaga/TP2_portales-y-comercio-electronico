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

    public function adminBlog(){
        $blogs = Blog::all();

        return view('admin.blogs', [
            'blogs' => $blogs
        ]);
    }

    public function adminBlogDetails(int $id){
        $article = Blog::find($id);

        return view('admin.detailsBlog', [
            'article' => $article
        ]);
    }

    public function createBlog(){
        return view('admin.createBlog');
    }

    public function createBlogProcess(Request $req){
        $req->validate(
            [
                'blog_title'=>'required | min:10 | max:50',
                'blog_author'=>'required | min:10',
                'blog_article' => 'required | min:50'
            ],
            [
                'blog_title.required' => 'El titulo es requerido.',
                'blog_title.min' => 'El titulo debe tener un minimo de 10 caracteres.',
                'blog_title.max' => 'El titulo debe tener un maximo de 50 caracteres.',
                // //
                'blog_author.required' => 'El autor es requerido.',
                'blog_author.min' => 'El autor debe tener un minimo de 10 caracteres.',
                // //
                'blog_article.required' => 'El post es requerido.',
                'blog_article.min' => 'El post debe tener un minimo de 50 caracteres.'
            ]
        );

        $input = $req->all([]);

        Blog::create($input);

        return redirect()->route('admin.blogs');
    }

    public function editBlog(int $id){
        $blog = Blog::find($id);

        return view('admin.editBlog', [
            'blog' => $blog
        ]);
    }

    public function editBlogProcess(int $id, Request $req){
        $req->validate(
            [
                'blog_title'=>'required | min:10 | max:50',
                'blog_author'=>'required | min:10',
                'blog_article' => 'required | min:50'
            ],
            [
                'blog_title.required' => 'El titulo es requerido.',
                'blog_title.min' => 'El titulo debe tener un minimo de 10 caracteres.',
                'blog_title.max' => 'El titulo debe tener un maximo de 50 caracteres.',
                // //
                'blog_author.required' => 'El autor es requerido.',
                'blog_author.min' => 'El autor debe tener un minimo de 10 caracteres.',
                // //
                'blog_article.required' => 'El post es requerido.',
                'blog_article.min' => 'El post debe tener un minimo de 50 caracteres.'
            ]
        );

        $input = $req->all([]);

        $articulo = Blog::findOrFail($id);

        $articulo->update($input);

        return redirect()->route('admin.blogs');
    }

    public function deleteBlog(int $id){
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect()->route('admin.blogs');
    }
}

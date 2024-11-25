<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class LandingController extends Controller
{
    public function landingPage(){
        $threeRandomBlogs = Blog::inRandomOrder()->limit(3)->get();

        return view('landing', [
            'random_blogs' => $threeRandomBlogs
        ]);
    }
}

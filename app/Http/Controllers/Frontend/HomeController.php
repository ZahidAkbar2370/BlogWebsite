<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
       $blogs = Blog::where("status", "active")->get();
        
        return view('welcome', compact('blogs'));
    }

    function viewBlog($id) {
        $blog = Blog::find($id);

        $randomBlogs = Blog::inRandomOrder()->paginate(5);

        return view('blog', compact('blog', 'randomBlogs'));
    }
}

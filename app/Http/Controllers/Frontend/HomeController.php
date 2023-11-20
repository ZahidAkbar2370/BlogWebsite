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

    function viewBlog($slug) {
        $blog = Blog::where("slug", $slug)->first();

        $randomBlogs = Blog::inRandomOrder()->paginate(5);

        return view('blog', compact('blog', 'randomBlogs'));
    }

    function searchBlog($searchCategory) {
        $category = Category::where("category_name", $searchCategory)->first();
        $blogs = Blog::where("category_id", $category->id)->where('status', "active")->get();

        return view('Frontend.search_blogs', compact('blogs'));
        
    }
}

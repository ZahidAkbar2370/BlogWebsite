<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard() {
        $totalBlogs = Blog::count();
        $totalActiveBlogs = Blog::where("status", "active")->count();
        $totalInactiveBlogs = Blog::where("status", "inactive")->count();

        $totalCategories = Category::count();
        $totalActiveCategories = Category::where("status", "active")->count();
        $totalInactiveCategories = Category::where("status", "inactive")->count();

        return view("Backend.Dashboard.dashboard", compact('totalBlogs',"totalCategories", 'totalActiveBlogs', 'totalInactiveBlogs', 'totalActiveCategories', 'totalInactiveCategories'));
    }
}

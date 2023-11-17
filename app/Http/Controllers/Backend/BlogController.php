<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    function index() {
        $allBlogs = Blog::all();


        return view("Backend.Blog.index", compact('allBlogs'));
    }

    function create(){
        $categories = Category::where("status", "active")->get();

        return view("Backend.Blog.create", compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required', 'max:255',
            'thumbnail' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');

            $fileName = time() . '_' . $thumbnail->getClientOriginalName();
    
            $thumbnail = $thumbnail->move('thumbnails', $fileName);
            
            Blog::create([
                "created_by" => Auth::user()->id ?? 1,
                "category_id" => $request->category_id,
                "title" => $request->title,
                "thumbnail" => $thumbnail,
                "tags" => $request->tags,
                "description" => $request->description,
                "seo_keywords" => $request->seo_keywords, 
                "seo_description" => $request->seo_description, 
                "seo_title" => $request->seo_title, 
                "url" => $request->url,
                "slug" => Str::random(30).time(),
            ]);
        }

        return redirect("backend/blogs")->with("success", "Blog Created Successfully!");
    }

    function edit($id){
        $categories = Category::where("status", "active")->get();

        $blog = Blog::find($id);

        return view("Backend.Blog.edit", compact('blog','categories'));
    }

    function update(Request $request) {

        $request->validate([
            'title' => 'required', 'max:255',
            'description' => 'required',
        ]);

        $blog = Blog::find($request->id);

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->category_id = $request->category_id;
        $blog->seo_title = $request->seo_title;
        $blog->seo_keywords = $request->seo_keywords;
        $blog->seo_description = $request->seo_description;
        $blog->url = $request->url;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');

            $fileName = time() . '_' . $thumbnail->getClientOriginalName();
    
            $blog->thumbnail = $thumbnail->move('thumbnails', $fileName);
        }

        $blog->update();

        return redirect("backend/blogs")->with("success", "Blog Updated Successfully!");
    }

    function show($id){
        $blog = Blog::find($id);

        return view("Backend.Blog.show", compact('blog'));
    }

    function destroy($id) {
        Blog::find($id)->delete();

        return redirect("backend/blogs")->with("success", "Blog Delete Successfully!");
    }

    public function updateStatus(Request $request)
{
    $blogId = $request->input('id');
    $status = $request->input('status');

    $blog = Blog::where('id', $blogId)->first();
    $blog->status = $status;
    
    $blog->update();
    
    return response()->json(['message' => "Blog Status Updated Successfully!"]);
}

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');

            $fileName = time() . '_' . $thumbnail->getClientOriginalName();
    
            $blog->thumbnail = $thumbnail->move('thumbnails', $fileName);
        }

        $blog->update();

        return redirect("backend/blogs")->with("success", "Blog Updated Successfully!");
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

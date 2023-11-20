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
        // print_r($request->all());exit;
        $request->validate([
            'title' => 'required|max:255|unique:blogs',
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
                "slug" => Str::slug($request->input('title')),
            ]);
        }

        return redirect("backend/blogs")->with("success", "Blog Created Successfully!");
    }

    function edit($id){
        $categories = Category::where("status", "active")->paginate(5);

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

function importform(){
    return view('Backend.Blog.import');
}
    public function import(Request $request)
    {
        $file = $request->file('csv_file');

        // Assuming your CSV file has headers (name, email, etc.)
        $data = array_map('str_getcsv', file($file));

        foreach ($data as $key => $row) {
            // print_r($data);exit;
            if($key > 0){
                $checkBlog = Blog::where("slug", $row[3])->count();

                if($checkBlog == 0){
                    Blog::create([
                        'created_by' => $row[1],
                        'category_id' => $row[2],
                        'slug' => $row[3],
                        'title' => $row[4],
                        'thumbnail' => $row[5],
                        'tags' => $row[6],
                        'description' => $row[7],
                        'status' => $row[8],
                        'seo_title' => $row[9],
                        'seo_description' => $row[10],
                        'url' => $row[11],
                    ]);
                }
            }


        }
        return redirect("backend/blogs")->with('success', 'Data imported successfully');
}
}

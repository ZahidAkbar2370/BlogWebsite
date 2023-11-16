<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function index() {
        $allCategories = Category::all();

        return view("Backend.Category.index", compact('allCategories'));
    }

    function create() {
        return view("Backend.Category.create");
    }

    function store(Request $request) {
        $request->validate([
            "category_name" => "required",
        ]);

        Category::create([
            "category_name" => $request->category_name,
            "created_by" => Auth::user()->id ?? 1,
        ]);

        return redirect("backend/categories")->with("success", "Category Created Successfully!");
    }

    function update(Request $request) {
        $category = Category::find($request->category_id);

        $category->category_name = $request->category_name;
        $category->update();

        return redirect("backend/categories")->with("success", "Category Updated Successfully!");
    }

    function destroy($id) {
        $selectCategory = Category::find($id);

        $selectCategory->blogs->each->delete();
        $selectCategory->delete();

        return redirect("backend/categories")->with("success", "Category with it's Blogs Delete Successfully!");
    }

    public function updateStatus(Request $request)
    {
        $categoryId = $request->input('id');
        $status = $request->input('status');
    
        $category = Category::where('id', $categoryId)->first();
        $category->status = $status;
        
        $category->update();
        
        return response()->json(['message' => "Status Updated Successfully!"]);
    }
}

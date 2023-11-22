<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    function index() {
        $allSubCategories = SubCategory::all();

        return view("Backend.SubCategory.index", compact('allSubCategories'));
    }

    function create() {
        $categories = Category::where("status", "active")->get();

        return view("Backend.SubCategory.create", compact("categories"));
    }

    function store(Request $request) {
        $request->validate([
            "sub_category_name" => "required",
        ]);

        SubCategory::create([
            "category_id" => $request->category_id,
            "sub_category_name" => $request->sub_category_name,
            "created_by" => Auth::user()->id ?? 1,
        ]);

        return redirect("backend/sub-categories")->with("success", "SubCategory Created Successfully!");
    }

    function destroy($id) {
        SubCategory::find($id)->delete();

        return redirect("backend/sub-categories")->with("success", "SubCategory Delete Successfully!");
    }
}

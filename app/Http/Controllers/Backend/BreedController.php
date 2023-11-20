<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breed;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BreedController extends Controller
{
    function index() {
        $allBreeds = Breed::all();

        return view('Backend.Breed.index', compact('allBreeds'));
    }

    function create() {
        $categories = Category::where("status", "active")->get();

        return view('Backend.Breed.create', compact('categories'));
    }

    function store(Request $request) {
        $request->validate([
            'breed_name' => 'required|max:255',
        ]);

        Breed::create([
            "created_by" => Auth::user()->id ?? '',
            "category_id" => $request->category_id,
            "breed_name" => $request->breed_name,
            "breed_description" => $request->breed_description,
        ]);

        return redirect("backend/breeds")->with("success", "Breed Created Successfully!");
    }

    function destroy($id) {
        Breed::find($id)->delete();

        return redirect("backend/breeds")->with("success", "Breed Deleted Successfully!");
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Characteristic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacteristicController extends Controller
{
    function index() {
        $allCharacteristics = Characteristic::all();

        return view("Backend.Characteristic.index", compact("allCharacteristics"));
    }

    function create() {
        $allCategories = Category::where("status", "active")->get();

        return view("Backend.Characteristic.create", compact("allCategories"));
    }

    function getCharacteristics($category_id) {
        $allCharacteristic = Characteristic::where("category_id",$category_id)->get();

        $result = view("Backend.Breed.selected_category_show_characteristics", compact("allCharacteristic"))->render();

        return $result;
    }

    public function store(Request $request){
        // print_r($request->all());
       if(!empty($request->characteristic_title)){
         foreach($request->characteristic_title as $key => $title){

       Characteristic::create([
        "created_by" => Auth::user()->id ?? 1,
        "category_id" => $request->category_id,
        "title" => $title,
        "value" => $request->characteristic_title[$key],
        ]);
}
       }

       return redirect("backend/characteristics")->with("success", "Characteristics Created Successfully!");

    }

    function destroy($id) {
        Characteristic::find($id)->delete();

        return redirect("backend/characteristics")->with("success", "Characteristics Deleted Successfully!");
    }


}

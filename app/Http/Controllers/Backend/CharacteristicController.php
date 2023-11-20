<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Characteristic;
use Illuminate\Http\Request;

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
}

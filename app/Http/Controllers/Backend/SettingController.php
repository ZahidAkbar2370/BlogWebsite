<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function viewSetting() {
        $setting = Setting::all();

        return view("Backend.Setting.view_settings", compact('setting'));
    }

    function updateSetting(Request $request) {

        $request->validate([
            'website_title' => 'required|max:255',
        ]);

       
        $formData = [
            'website_title' => $request->website_title,
            "menu_show_category" => $request->menu_show_category ?? "off",
            "menu_show_login" =>  $request->menu_show_login ?? "off",
            "menu_show_home" => $request->menu_show_home ?? "off", 
            "menu_show_about" => $request->menu_show_about ?? "off",
        ];


        if ($request->hasFile('website_logo')) {
            $website_logo = $request->file('website_logo');

            $fileName = time() . '_' . $website_logo->getClientOriginalName();
    
            $formData['website_logo'] = $website_logo->move('website_logo', $fileName);
        }

        foreach ($formData as $key => $setting) {
            Setting::where('key_title', $key)->update(['key_value' => $setting]);
        }
        
        return redirect("backend/settings")->with("success", "Setting Updated Successfully!");
    }
}

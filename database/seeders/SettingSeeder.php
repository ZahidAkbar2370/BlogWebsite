<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            "key_title" => "website_title",
            "key_value" => "Blog",
        ]);

        Setting::create([
            "key_title" => "website_logo",
            "key_value" => "https://mlwbe1wdytjl.i.optimole.com/cb:Z-zT.3605b/w:1381/h:164/q:mauto/f:best/https://petfriendly.com/wp-content/uploads/2023/04/pf.logo_.4.png",
        ]);

        Setting::create([
            "key_title" => "menu_show_category",
            "key_value" => 0,
        ]);

        Setting::create([
            "key_title" => "menu_show_login",
            "key_value" => 0,
        ]);

        Setting::create([
            "key_title" => "menu_show_home",
            "key_value" => 0,
        ]);

        Setting::create([
            "key_title" => "menu_show_about",
            "key_value" => 0,
        ]);
    }
}

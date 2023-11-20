<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get("/", [App\Http\Controllers\Frontend\HomeController::class, "index"]);
Route::get("blog/{id}", [App\Http\Controllers\Frontend\HomeController::class, "viewBlog"]);
Route::get("search-blog/{search}", [App\Http\Controllers\Frontend\HomeController::class, "searchBlog"]);

Route::prefix('backend')->middleware(['auth'])->group( function () {

    Route::get("dashboard", [App\Http\Controllers\Backend\DashboardController::class, "dashboard"]);

    Route::get("categories", [App\Http\Controllers\Backend\CategoryController::class, "index"]);
    Route::get("create-category", [App\Http\Controllers\Backend\CategoryController::class, "create"]);
    Route::post("save-category", [App\Http\Controllers\Backend\CategoryController::class, "store"]);
    Route::get('/update-category-status', [App\Http\Controllers\Backend\CategoryController::class, "updateStatus"]);
    Route::get('/delete-category/{id}', [App\Http\Controllers\Backend\CategoryController::class, "destroy"]);
    Route::post("update-category", [App\Http\Controllers\Backend\CategoryController::class, "update"]);

    Route::get("blogs", [App\Http\Controllers\Backend\BlogController::class, "index"]);
    Route::get("create-blog", [App\Http\Controllers\Backend\BlogController::class, "create"]);
    Route::post("save-blog", [App\Http\Controllers\Backend\BlogController::class, "store"]);
    Route::get('/update-blog-status', [App\Http\Controllers\Backend\BlogController::class, "updateStatus"]);
    Route::get('/edit-blog/{id}', [App\Http\Controllers\Backend\BlogController::class, "edit"]);
    Route::get('/show-blog/{id}', [App\Http\Controllers\Backend\BlogController::class, "show"]);
    Route::post("update-blog", [App\Http\Controllers\Backend\BlogController::class, "update"]);
    Route::get('/delete-blog/{id}', [App\Http\Controllers\Backend\BlogController::class, "destroy"]);

    Route::get('/characteristics', [App\Http\Controllers\Backend\CharacteristicController::class, 'index']);
    Route::get('/create-characteristic', [App\Http\Controllers\Backend\CharacteristicController::class, 'create']);
    Route::get('/get-characteristics/{category_id}', [App\Http\Controllers\Backend\CharacteristicController::class, 'getCharacteristics']);

    Route::get('/breeds', [App\Http\Controllers\Backend\BreedController::class, 'index']);
    Route::get('/create-breed', [App\Http\Controllers\Backend\BreedController::class, 'create']);
    Route::post('/save-breed', [App\Http\Controllers\Backend\BreedController::class, 'store']);
    Route::get('/delete-breed/{id}', [App\Http\Controllers\Backend\BreedController::class, 'destroy']);

    Route::get('/settings', [App\Http\Controllers\Backend\SettingController::class, "viewSetting"]);
    Route::post('/update-setting', [App\Http\Controllers\Backend\SettingController::class, "updateSetting"]);

    Route::get('/export-data', [App\Http\Controllers\CommonController::class, 'exportData'])->name('blogs.export');

    Route::get('/import-blog', [App\Http\Controllers\Backend\BlogController::class, 'importForm']);
Route::post('/import-blog', [App\Http\Controllers\Backend\BlogController::class, 'import'])->name('blog.import');




});

Auth::routes();
// Route::get("register", function(){
//     return redirect("login");
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

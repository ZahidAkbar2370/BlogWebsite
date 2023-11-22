<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "sub_categories";
    protected $fillable = [
        "created_by",
        "category_id",
        "sub_category_name"
    ];

    function categories() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}

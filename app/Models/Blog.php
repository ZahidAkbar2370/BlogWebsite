<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        "created_by",
        "category_id",
        "sub_category_id",
        "breed_id",
        "slug",
        "seo_title",
        "seo_keywords",
        "seo_description",
        "url",
        "title",
        "thumbnail",
        "tags",
        "description",
        "status",
    ];

    function categories() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    function sub_categories() {
        return $this->belongsTo(SubCategory::class, "sub_category_id", "id");
    }

    function breeds() {
        return $this->belongsTo(Breed::class, "breed_id", "id");
    }

    function users() {
        return $this->belongsTo(User::class, "created_by", "id");
    }
}

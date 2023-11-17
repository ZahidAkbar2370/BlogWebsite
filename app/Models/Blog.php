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

    function users() {
        return $this->belongsTo(User::class, "created_by", "id");
    }
}

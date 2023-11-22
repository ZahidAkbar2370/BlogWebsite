<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

    protected $table = "characteristics";

    protected $fillable = [
        "created_by",
        "category_id",
        "title",
        "value",

    ];

    function categories() {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}

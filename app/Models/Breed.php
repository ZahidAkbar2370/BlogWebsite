<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $table = "breeds";

    protected $fillable = [
        'category_id',
        'breed_name',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', "id");
    }
}

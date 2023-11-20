<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedCharacteristics extends Model
{
    use HasFactory;
    protected $table = "breed_characteristics";

    protected $fillable = [
        "created_by",
        "bread_id",
        "title",
        "value"
    ];
}

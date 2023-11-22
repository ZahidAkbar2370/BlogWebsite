<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $table = "breeds";

    protected $fillable = [
        'created_by',
        'category_id',
        'breed_name',
        "breed_description",
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', "id");
    }

    public function breedCharacteristics()
    {
        return $this->hasMany(BreedCharacteristics::class, 'breed_id', "id");
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class, 'breed_characteristics', 'breed_id', 'characteristic_id');
    }
}

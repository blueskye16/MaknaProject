<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodIngridients extends Model
{
    /** @use HasFactory<\Database\Factories\FoodIngridientsFactory> */
    
    use HasFactory;
    protected $guarded = ['id'];

}

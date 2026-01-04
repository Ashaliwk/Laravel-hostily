<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $table = 'foodItems';
    protected $fillable = ['name', 'images'];
}

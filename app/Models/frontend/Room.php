<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image', 'category'];

    // If your table name is 'products' or 'pastrys'
    // protected $table = 'products';

    public function bookings()
    {
        return $this->hasMany(\App\Models\frontend\Booking::class);
    }
}
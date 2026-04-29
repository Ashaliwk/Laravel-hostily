<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = ['name', 'price', 'description', 'image', 'category', 'room_type', 'max_persons', 'ac_type', 'bed_type', 'meal_plan', 'room_status', 'is_wifi', 'is_parking'];

    // If your table name is 'products' or 'pastrys'
    // protected $table = 'products';

    public function bookings()
    {
        return $this->hasMany(\App\Models\frontend\Booking::class);
    }
}

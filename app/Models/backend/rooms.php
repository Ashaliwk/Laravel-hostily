<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $fillable = ['name', 'price', 'description', 'image', 'status'];
    protected $primary_key = "id";
}

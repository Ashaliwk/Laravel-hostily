<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waffles extends Model
{
    use HasFactory;
    protected $table = "waffleproduct";
    protected $primary_key = "id";
}

<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaffleModel extends Model
{
    use HasFactory;
    protected $table = "waffle";
    protected $primary_key = "id";
}

<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'designation',
        'intro',
        'insta',
        'image'
    ];
}
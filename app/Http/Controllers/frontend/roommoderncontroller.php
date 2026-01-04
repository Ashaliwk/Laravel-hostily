<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Room;

class roommoderncontroller extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('frontend.roommodern', compact('rooms'));
    }
}
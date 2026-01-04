<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;
use App\Models\frontend\Room;

class roomstylecontroller extends Controller
{
    public function index()
    {
           $rooms = Room::all();
        return view('frontend.roomstyle',compact('rooms'));
    }
}

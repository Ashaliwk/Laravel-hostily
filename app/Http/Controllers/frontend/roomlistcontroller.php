<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;
use App\Models\frontend\Room;
class roomlistcontroller extends Controller
{
    public function index()
    {
           $rooms = Room::all();
        return view('frontend.roomlist', compact('rooms'));
    }
}

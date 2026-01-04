<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Room;

class roomdetailscontroller extends Controller
{
    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view('frontend.roomdetails', compact('room'));
    }
}
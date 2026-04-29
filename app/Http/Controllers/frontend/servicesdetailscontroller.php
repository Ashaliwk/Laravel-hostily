<?php

namespace App\Http\Controllers\frontend;

use App\Models\backend\Team;
use App\Models\frontend\Room;
use Illuminate\Routing\Controller;

class servicesdetailscontroller extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $rooms = Room::orderBy('price')->take(6)->get();

        return view('frontend.servicesdetails', compact('teams', 'rooms'));
    }
}

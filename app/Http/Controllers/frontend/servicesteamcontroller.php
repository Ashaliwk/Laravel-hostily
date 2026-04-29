<?php

namespace App\Http\Controllers\frontend;

use App\Models\backend\Team;
use Illuminate\Routing\Controller;

class servicesteamcontroller extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('frontend.servicesteam', compact('teams'));
    }
}

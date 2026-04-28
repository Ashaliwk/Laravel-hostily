<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;
use App\Models\backend\Team;


class aboutcontroller extends Controller
{
    public function index()
    {

        $teams = Team::all();
        return view('frontend.about', compact('teams'));
    }
}

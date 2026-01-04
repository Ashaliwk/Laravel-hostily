<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;
use App\Models\backend\rooms;

class IndexController extends Controller
{
    public function index()
    {
        $rooms = rooms::all(); // ✅ Fetch data
        return view('frontend.index', compact('rooms')); // ✅ Send to view
    }
}


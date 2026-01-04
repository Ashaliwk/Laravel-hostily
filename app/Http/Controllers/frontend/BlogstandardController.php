<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class blogstandardcontroller extends Controller
{
    public function index()
    {
        return view('frontend.blogstandard');
    }
}

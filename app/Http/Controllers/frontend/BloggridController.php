<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class bloggridcontroller extends Controller
{
    public function index()
    {
        return view('frontend.bloggrid');
    }
}

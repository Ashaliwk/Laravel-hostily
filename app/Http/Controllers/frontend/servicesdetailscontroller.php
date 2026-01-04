<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Routing\Controller;

class servicesdetailscontroller extends Controller
{
    public function index()
    {
        return view('frontend.servicesdetails');
    }
}
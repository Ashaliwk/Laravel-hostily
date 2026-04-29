<?php

namespace App\Http\Controllers\frontend;

use App\Models\backend\rooms;
use App\Models\frontend\BlogModel;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $rooms = rooms::all();
        $blogs = BlogModel::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('frontend.index', compact('rooms', 'blogs'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::get();
        return view('admin.dashboard')->with(['movies' => $movies]);
    }
}

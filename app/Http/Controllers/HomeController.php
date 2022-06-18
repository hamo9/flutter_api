<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\resturants;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = categories::all()->count();
        $resturants = resturants::all()->count();

        return view('home',compact('resturants','categories'));
    }
}

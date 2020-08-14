<?php

namespace App\Http\Controllers;

use App\Gym;
use App\Hotel;
use App\Restaurant;
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
        return view('welcome');
    }
    public function prenota()
    {
        $gyms = Gym::all();
        $restaurants = Restaurant::all();
        $hotels = Hotel::all();

        return view('prenota', compact('gyms','hotels','restaurants'));
    }
}

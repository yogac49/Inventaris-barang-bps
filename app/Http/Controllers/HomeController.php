<?php

namespace App\Http\Controllers;

use App\Commodity;
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
    public function index(Request $request)
    {
     
        $commodity_count = Commodity::count();

        $commodity_condition_good_count = Commodity::where('condition', 1)->count();
        $commodity_condition_not_good_count = Commodity::where('condition', 2)->count();
        $commodity_condition_heavily_damage_count = Commodity::where('condition', 3)->count();

        
        return view('home', compact('commodity_count', 'commodity_condition_good_count', 'commodity_condition_not_good_count', 'commodity_condition_heavily_damage_count'));
   
        }
}

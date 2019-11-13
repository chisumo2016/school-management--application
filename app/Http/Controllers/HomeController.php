<?php

namespace App\Http\Controllers;

use App\Slide;
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
        $sliders = Slide::where('status',1)->get();
        //return $sliders;
        return view('admin.home.home',compact('sliders'));
        //return view('home');
    }
}

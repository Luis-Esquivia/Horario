<?php

namespace App\Http\Controllers;

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
        $request->user()->authorizeRoles(['admin', 'coordinador', 'instructor']);
        if($request->user()->hasRole('instructor')){
            return view('home.instructor');
        }
        if($request->user()->hasRole('coordinador')){
            return view('home.coordinador');
        }
        return view('home');
    }

}

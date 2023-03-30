<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;

class FrontendController extends Controller
{
    public function loadfichas($string)
    {
        $fichas=Ficha::where("idficha","like","%".$string."%")->get();


        return view('for_each_options',compact('fichas'))->render();
    }
    public function loadFichasHorario($id)
    {
        $ficha=Ficha::find($id);


        return view('for_each_horario',compact('ficha'))->render();
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ficha;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarfichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->hasRole('admin')){
            $users = User::whereHas('roles', function($q){
                    $q->where('name', 'aprendiz')->orWhere('name','instructor');
                }
            )->get();
            return view('asignarficha.index',compact('users'));
        }

        if($request->user()->hasRole('coordinador')){
            $sedes=$request->user()->sedes->pluck('id')->toArray();
            $users = User::whereHas('roles',function($q){
                $q->where('name','instructor');
            })->whereHas('sedes',function($q) use($sedes) {
                $q->whereIn('sede_id', $sedes);
            })->paginate(5);

            return view('asignarficha.index',compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'aprendiz')->orWhere('name','instructor');
        }
    )->get();
        return view('asignarficha.create' , compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*DB::table('ficha_user')->insert(
            ['user_id' => $request->user_id, 'ficha_id' => $request->ficha_id]
        );*/

        $user =User::find($request->user_id);
        $user->fichas()->attach(Ficha::find($request->ficha_id));
        return redirect()->route('asignarficha.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('asignarficha.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('asignarficha.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('asignarficha.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('asignarficha.index');
    }
}

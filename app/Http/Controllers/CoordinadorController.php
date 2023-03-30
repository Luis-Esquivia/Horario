<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Role::where('name', 'coordinador')->first();
        $coordinadors = $rol->users()->paginate(5);
        return view('coordinador.index', compact('coordinadors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('coordinador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt ($request->password),
        ]);
        $user->roles()->attach(Role::where('name', 'coordinador')->first());
        return redirect()->route('coordinador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $coordinador)
    {
        return view('coordinador.show', compact('coordinador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $coordinador)
    {
        return view('coordinador.edit',compact('coordinador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $coordinador)
    {
        if($request->password!=""){
          $coordinador->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt ($request->password),
        ]);
        }else{
            $coordinador->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('coordinador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('coordinador.index');
    }
}

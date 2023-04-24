<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;

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
        return view('admin.coordinador.index', compact('coordinadors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.coordinador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'sede_id' => 'required',
        ]);

        $valueStr = Str::substr($request->name, 0, 2);
        $password = $request->email.$valueStr.'*';
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $request->sede_id,
            'password' => bcrypt ($password),
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
        return view('admin.coordinador.show', compact('coordinador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $coordinador)
    {
        return view('admin.coordinador.edit',compact('coordinador'));
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

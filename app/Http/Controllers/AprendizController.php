<?php

namespace App\Http\Controllers;

use App\Models\aprendiz;
use App\Models\User;
use App\Models\Role;
use App\Imports\AprendizImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('roles',function($q){
            $q->where('name', 'aprendiz');
        })->paginate(5);
        return view('aprendiz.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aprendiz.create');
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
            'name' => $request->name.' '.$request->lastname,
            'email' => $request->email,
            'password' => bcrypt ("12345678"),
            'sede_id' => $request->sede_id,
        ]);
        $user->roles()->attach(Role::where('name', 'aprendiz')->first());
        aprendiz::create(['document_type'=>$request->document_type,
                          'document'=>$request->document,
                          'name'=>$request->name,
                          'lastname'=>$request->lastname,
                          'user_id'=>$user->id,]);
        return redirect()->route('aprendiz.index');
    }
    public function importExcel(Request $request){

        Excel::import(new AprendizImport, $request->file("file"));

        return redirect()->route('aprendiz.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $aprendiz)
    {
        return view('aprendiz.show', compact('aprendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $aprendiz)
    {
        return view('aprendiz.edit', compact('aprendiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aprendiz $aprendiz)
    {
        $aprendiz->update($request->all());

        return redirect()->route('aprendiz.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(aprendiz $aprendiz)
    {
        $aprendiz->delete();
        return redirect()->route('aprendiz.index');
    }
}

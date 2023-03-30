<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PrograImport;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->hasRole('admin')){
           $programa = Programa::paginate(5);
        return view('programa.index', compact('programa'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Programa::create($request->all());
        return redirect()->route('programa.index');
    }

    public function loadMalla($id,Request $request){
        //$path1 = $request->file("file")->store('temp');
        //$path=storage_path('app').'/'.$path1;
        $programa= Programa::find($id);
        return view('programa.modal',compact('programa'))->render();
    }
    public function importExcel(Request $request){
        //$path1 = $request->file("file")->store('temp');
        //$path=storage_path('app').'/'.$path1;
        Excel::import(new PrograImport, $request->file("file"));

        return redirect()->route('programa.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        return view('programa.show', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        return view('programa.edit', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        $programa->update($request->all());

        return redirect()->route('programa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();
        return redirect()->route('programa.index');
    }
}

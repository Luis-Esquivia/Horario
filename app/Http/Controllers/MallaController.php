<?php

namespace App\Http\Controllers;

use App\Models\Malla;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MallaImport;

class MallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mallas = Malla::paginate(5);
        return view('malla.index', compact('mallas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('malla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Malla::create($request->all());
        return redirect()->route('malla.index');
    }
    public function importExcel(Request $request){
        Excel::import(new MallaImport, $request->file("file"));

        return redirect()->route('malla.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Malla $malla)
    {
        return view('malla.show', compact('malla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Malla $malla)
    {
        return view('malla.edit', compact('malla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Malla $malla)
    {
        $malla->update($request->all());

        return redirect()->route('malla.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Malla $malla)
    {
        $malla->delete();
        return redirect()->route('malla.index');
    }
}

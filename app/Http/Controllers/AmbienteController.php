<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->hasRole('admin')){
            $ambientes = Ambiente::paginate(5);

        return view('ambiente.index', compact('ambientes'));
        }
        if($request->user()->hasRole('coordinador')){
            $sedes=$request->user()->sedes->pluck('id')->toArray();
            //dd($sedes);
            $ambientes = Ambiente::whereIn('sede_id', $sedes)->paginate(5);

        return view('ambiente.index', compact('ambientes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ambiente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ambiente::create($request->all());
        return redirect()->route('ambiente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function show(Ambiente $ambiente)
    {
        return view('ambiente.show', compact('ambiente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambiente $ambiente)
    {
        return view('ambiente.edit', compact('ambiente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambiente $ambiente)
    {
        $ambiente->update($request->all());

        return redirect()->route('ambiente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ambiente  $ambiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();
        return redirect()->route('ambiente.index');
    }
}

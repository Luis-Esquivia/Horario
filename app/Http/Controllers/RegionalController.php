<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regional = Regional::paginate(5);
        return view('admin.regional.index', compact('regional'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regional.create');
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
            'id_regional' => 'required',
            'name' => 'required|string',
        ]);
        Regional::create($request->all());
        return redirect()->route('regional.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Regional $regional)
    {
        return view('admin.regional.show', compact('regional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\regional
     * @return \Illuminate\Http\Response
     */
    public function edit(Regional $regional)
    {
        return view('admin.regional.edit', compact('regional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regional $regional)
    {
        $request->validate([
            'id_regional' => 'required',
            'name' => 'required|string',
        ]);
        $regional->update($request->all());

        return redirect()->route('regional.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regional $regional)
    {
        $regional->delete();
        return redirect()->route('regional.index');
    }
}

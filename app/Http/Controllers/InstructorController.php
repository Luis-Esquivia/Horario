<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Sede;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Imports\InstructorImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Gate;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->hasRole('admin')){

        $users = User::whereHas('roles',function($q){
            $q->where('name', 'instructor');
        })->paginate(5);
        return view('instructor.index', compact('users'));
    }
        if($request->user()->hasRole('coordinador')){
            $sedes=$request->user()->sedes->pluck('id')->toArray();
            $users = User::whereHas('roles',function($q){
                $q->where('name', 'instructor');
            })->whereHas('sedes',function($q) use($sedes) {
                $q->whereIn('sede_id', $sedes);
            })->paginate(5);

            return view('instructor.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.create');
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
        ]);
        $user->roles()->attach(Role::where('name', 'instructor')->first());
        $user->sedes()->attach(Sede::find($request->sede_id));
        Instructor::create(['document_type'=>$request->document_type,
                          'document'=>$request->document,
                          'name'=>$request->name,
                          'lastname'=>$request->lastname,
                          'birthday'=>$request->birthday,
                          'residence_city'=>$request->residence_city,
                          'email'=>$request->email,
                          'address'=>$request->address,
                          'phone'=>$request->phone,
                          'contractor_type'=>$request->contractor_type,
                          'start_date'=>$request->start_date,
                          'end_date'=>$request->end_date,
                          'object_contract'=>$request->object_contract,
                          'education_level'=>$request->education_level,
                          'profession'=>$request->profession,
                          'user_id'=>$user->id,]);

        return redirect()->route('instructor.index');
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request){
        //$path1 = $request->file("file")->store('temp');
        //$path=storage_path('app').'/'.$path1;
        Excel::import(new InstructorImport, $request->file("file"));

        return redirect()->route('instructor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $instructor)
    {
        return view('instructor.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $instructor)
    {
        return view('instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        $instructor->update($request->all());

        return redirect()->route('instructor.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructor.index');
    }
}

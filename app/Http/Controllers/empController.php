<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emp;

class empController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp=emp::get();
        return response()->json($emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emp_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->get('name');
        $depart=$request->get('department');
        $salary=$request->get('salary');
        $emp=new emp([
            'name'=>$name,
            'department'=>$depart,
            'salary'=>$salary
        ]);
        $emp->save();
        echo "data insert";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=emp::find($id);
        $emp->delete();
        return redirect('/empweb/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=emp::find($id);
        return view('emp_update',compact('emp'));
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
        $update=emp::find($id);
        $name=$request->get('name');
        $depart=$request->get('department');
        $salary=$request->get('salary');
        
        $update->name=$name;
        $update->department=$depart;
        $update->salary=$salary;
        $update->update();
        return response()->json('data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

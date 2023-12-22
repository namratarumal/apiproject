<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stud=student::get();
        return response()->json($stud);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stud_form');
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
        $email=$request->get('email');
        $branch=$request->get('branch');
        $student=new student([
            'name'=>$name,
            'email'=>$email,
            'branch'=>$branch
            
        ]);
        $student->save();
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
        $student=student::find($id);
        $student->delete();
        return redirect('/studentweb/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stud=student::find($id);
        return view('edit_stud',compact('stud'));
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
        $stud=student::find($id);
        $name=$request->get('name');
        $email=$request->get('email');
        $branch=$request->get('branch');
        $stud->name=$name;
        $stud->email=$email;
        $stud->branch=$branch;
        $stud->update();
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
        $remove=student::find($id);
        $remove->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}

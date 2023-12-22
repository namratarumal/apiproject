<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;

class personController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person=person::get();
        return response()->json($person);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_form');
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
        $contact=$request->get('contact');
        $address=$request->get('address');
        $insert=new person([
            'name'=>$name,
            'email'=>$email,
            'contact'=>$contact,
            'address'=>$address
        ]);
        $insert->save();
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
        $delete=person::find($id);
        $delete->delete();
        return redirect('/personweb/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person=person::find($id);
        return view('person_update',compact('person'));
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
        $update=person::find($id);
        $name=$request->get('name');
        $email=$request->get('email');
        $contact=$request->get('contact');
        $address=$request->get('address');

        $update->name=$name;
        $update->email=$email;
        $update->contact=$contact;
        $update->address=$address;
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

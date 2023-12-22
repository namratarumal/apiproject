<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\imageUpload;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $img=imageUpload::get();
        return response()->json($img);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('img_form');
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
        $img=$request->file('image');
        $imgtemp=$img->getClientOriginalName();
        $img->move('img',$imgtemp);
        $insert=new imageUpload([
            'name'=>$name,
            'image'=>$imgtemp
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
        $img=imageUpload::find($id);
        $img->delete();
        return redirect('/imageweb/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $img=imageUpload::find($id);
        return view('img_update',compact('img'));
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
        $name=$request->get('name');
        $img=$request->file('image');
        if($img!="")
        {
            $imgtemp=$img->getClientOriginalName();
        $img->move('img',$imgtemp);
        $update=imageUpload::find($id);
        $update->name=$name;
        $update->image=$imgtemp;
        $update->update();
        return response()->json('data updated');
        }
        else
        {
            $update=imageUpload::find($id);
            $update->name=$name;    
        $update->update();
        return response()->json('data updated');
        }
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
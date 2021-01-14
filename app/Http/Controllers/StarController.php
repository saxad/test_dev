<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Information;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class StarController extends Controller
{
    /**
     * Display a starts in home view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Information::all();
        return view('partials.home', compact('stars'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created star in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //constraint on the celebrity addition form
        $validateData = $request->validate([
            'first_name' => 'required | max : 255',
            'last_name' => 'required | max : 255',
            'description' => 'required | max : 2255',
            'image' => 'required | mimes:jpg,bmp,png,gif,jpeg '
        ]);

        $star = new Information();
        $star->first_name = $request->first_name;
        $star->last_name = $request->last_name;
        $star->description = $request->description;


        if ($request->file()) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

            
            $star->image = '/storage/' . $filePath;
        }

        $star->save();

        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *21
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     *  find a star from it's Id  return array of information
     * @param int $starId
     * @return array 
     */
    public function load($starId)
    {
        $star =  Information::find($starId);
        $starInformation['first_name'] = $star->first_name;
        $starInformation['last_name'] = $star->last_name;
        $starInformation['description'] = $star->description;
        $starInformation['image'] = url($star->image);
        $starInformation['id'] = $star->id;
        return $starInformation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validateData = $request->validate([
            'first_name' => 'required | max : 255',
            'last_name' => 'required | max : 255',
            'description' => 'required | max : 2255',
            'image' => 'mimes:jpg,bmp,png,gif,jpeg '
        ]);
        $star = Information::find($id);
        $star->first_name  = $request->first_name;
        $star->last_name  = $request->last_name;
        $star->description  = $request->description;
        $image_name = explode('/',$star->image);
        $image_name = end($image_name);
        

        if ($request->file()) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

            //$star->image = time().'_'.$request->file('image')->getClientOriginalName();
            $star->image = '/storage/' . $filePath;


            unlink(storage_path('app/public/uploads/'.$image_name));
        }

        $star->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Information::destroy($id);
        return redirect('/');
    }
}

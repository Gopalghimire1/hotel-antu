<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Floor;
use Illuminate\Http\Request;

class FloorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors = Floor::latest()->paginate(10);
        return view('back.floor.index',compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.floor.create');
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
            'name'=>'required|max:191|unique:floors',
            'number'=>'required|integer|unique:floors',
       ]);

       $floor = new Floor();
       $floor->name = $request->name;
       $floor->number = $request->number;
       $floor->description = $request->description;
       $floor->status = $request->has('status')?1:0;
    //    dd($floor);
       $floor->save();
       return redirect()->back()->with('success','Floor has been created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        return view('back.floor.edit',compact('floor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        $request->validate([
            'name'=>'required|max:191',
            'number'=>'required|integer',
       ]);

       $floor->name = $request->name;
       $floor->number = $request->number;
       $floor->description = $request->description;
       $floor->status = $request->has('status')?1:0;
    //    dd($floor);
       $floor->save();
       return redirect()->back()->with('success','Floor has been updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        //
    }
}

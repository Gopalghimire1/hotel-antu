<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Amenity;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenity = Amenity::latest()->paginate(10);
        return view('back.amenity.index',compact('amenity'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.amenity.create');
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
            'name' => 'required',
            'picture'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $amenity = new Amenity();
        $amenity->name = $request->name;
        if($request->has('image')){
            $imageName = time().'.'.$request->picture->extension();
            $request->picture->move(public_path('back/images/guest/pic'), $imageName);
            $amenity->image = $imageName;
       }
        $amenity->description = $request->description;
        $amenity->status = $request->has('status')?1:0;
        // dd($amenity);
        $amenity->save();
        return redirect()->back()->with('success',' Amenity has been saved successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function show(Amenity $amenity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenity $amenity)
    {
        return view('back.amenity.edit',compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenity $amenity)
    {
        $request->validate([
            'name' => 'required',
            'picture'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $amenity->name = $request->name;
        if($request->has('image')){
            $imageName = time().'.'.$request->picture->extension();
            $request->picture->move(public_path('back/images/guest/pic'), $imageName);
            $amenity->image = $imageName;
       }
        $amenity->description = $request->description;
        $amenity->status = $request->has('status')?1:0;
        // dd($amenity);
        $amenity->save();
        return redirect()->back()->with('success',' Amenity has been updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity)
    {
        //
    }
}

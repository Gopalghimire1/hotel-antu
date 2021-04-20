<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Room;
use App\Model\RoomType;
use App\Model\Floor;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::latest()->paginate(10);
        return view('back.room.index',compact('rooms'));
    }

    public function create(){
        $floors = Floor::where('status',1)->get();
        $room_types = RoomType::where('status',1)->get();
        return view('back.room.create',compact('floors','room_types'));
    }

    public function store(Request $request){
        $request->validate([
            'number'=>'required|integer|unique:rooms',
            'room_type'=>'required|integer',
            'floor'=>'required|integer',
            'image'=>'nullable|image|mimes:jpeg,jpg|max:2048',
        ]);

        $room = new Room();
        $room->room_type_id = $request->room_type;
        $room->floor_id = $request->floor;
        $room->number = $request->number;
        if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('back/images/guest/pic'), $imageName);
            $room->image = $imageName;
       }
        $room->status = $request->has('status')?1:0;
        // dd($room);
        $room->save();
        return redirect()->back()->with('success','Room has been created successful');
    }

    public function edit(Room $room){
        $floors = Floor::where('status',1)->get();
        $room_types = RoomType::where('status',1)->get();
        return view('back.room.edit',compact('room','floors','room_types'));
    }

    public function update(Request $request, Room $room){
        $request->validate([
            'number'=>'required|integer',
            'room_type'=>'required|integer',
            'floor'=>'required|integer',
            'image'=>'nullable|image|mimes:jpeg,jpg|max:2048',
        ]);

        $room->room_type_id = $request->room_type;
        $room->floor_id = $request->floor;
        $room->number = $request->number;
        if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('back/images/guest/pic'), $imageName);
            $room->image = $imageName;
       }
        $room->status = $request->has('status')?1:0;
        // dd($room);
        $room->save();
        return redirect()->back()->with('success','Room has been updated successful');
    }
}

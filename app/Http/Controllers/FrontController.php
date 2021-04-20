<?php

namespace App\Http\Controllers;

use App\Model\RoomType;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
       $rooms = RoomType::latest()->where('status','!=',0)->get();
        return view('front.index',compact('rooms'));
    }

    public function roomList(){
        $rooms = RoomType::where('status','!=',0)->latest()->paginate(6);
        return view('front.room.index',compact('rooms'));
    }

    public function singleRoom($room_id){
        $room = RoomType::findOrFail($room_id);
        return view('front.room.single',compact('room'));
    }

}

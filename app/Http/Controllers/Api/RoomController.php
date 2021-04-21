<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Room;
use App\Model\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function rooms(){
        $roomType = RoomType::where('status',1)->get();
        $rooms = [];
        foreach ($roomType as $type) {
            $room = Room::where('room_type_id',$type->id)->where('status',1)->get();
            array_push($rooms,$room);
        }

        return response()->json(['room_type'=>$roomType,'rooms'=>$rooms]);
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Room;
use App\Model\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function rooms(){
        $roomType = RoomType::where('status',1)->with('room')->get();
        return response()->json(['room_type'=>$roomType]);
    }

}

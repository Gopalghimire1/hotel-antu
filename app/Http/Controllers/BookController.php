<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Model\RoomType;

class BookController extends Controller
{


    public function index(Request $request){
        //get all roomtype
        $data = RoomType::where('status',1)->get();

            if($request->filled('roomid')){
                return view('front.book',['room_types'=>$data,'id'=>$request->roomid,'codes'=>Country::$list]);

            }else{

                return view('front.book',['room_types'=>$data,'codes'=>Country::$list]);
            }
    }

    public function getRoom(Request $request){
        $roomtype = RoomType::where('id',$request->id)->first();
        $data['id']= $roomtype->id;
        $data['base_price']= $roomtype->base_price;
        $data['title'] = $roomtype->title;
        $data['image'] = $roomtype->featuredImage()->image;
        return view('front.booking.roominfo',['room'=>(object)$data]);
    }
}


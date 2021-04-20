<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class BookController extends Controller
{


    public function index(Request $request){
        //get all roomtype
        $data=[
                [
                    "id"=>1,
                    "base_price"=>100,
                    "title"=>"name1",

                ],
                [
                    "id"=>2,
                    "base_price"=>200,
                    "title"=>"name2",

                ],
                [
                    "id"=>3,
                    "base_price"=>300,
                    "title"=>"name3",

                ],
            ];
            if($request->filled('roomid')){
                return view('front.book',['room_types'=>$data,'id'=>$request->roomid,'codes'=>Country::$list]);

            }else{

                return view('front.book',['room_types'=>$data,'codes'=>Country::$list]);
            }
    }

    public function getRoom(Request $request){
        $data['id']=$request->id;
        $data['base_price']=100*$request->id;
        $data['title']="name ".$request->id;
        return view('front.booking.roominfo',['room'=>(object)$data]);
    }
}


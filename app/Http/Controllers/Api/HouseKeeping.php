<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Room;
use App\Models\HKStatus;
use Illuminate\Http\Request;
use App\ApiData as res;
use App\Models\Employee;

class HouseKeeping extends Controller
{
    public function index(){
        $hks=HKStatus::join("rooms",'rooms.id',"=","h_k_statuses.room_id")
            ->join('employees','employees.id','=',"h_k_statuses.employee_id")
            ->select("h_k_statuses.*","rooms.number","employees.first_name","employees.last_name",'rooms.number')
            ->get();
            return res::S($hks);
    }

    public function current(){
        $hks=HKStatus::join("rooms",'rooms.id',"=","h_k_statuses.room_id")
        ->join('employees','employees.id','=',"h_k_statuses.employee_id")
        ->select("h_k_statuses.*","rooms.number","employees.first_name","employees.last_name",'rooms.number')
        ->where('h_k_statuses.status',0)
        ->get();
        return res::S($hks);
    } 

    public function add(Request $request){
        $hk=new HKStatus();
        $hk->time=$request->time;
        $hk->room_id=$request->room_id;
        $hk->employee_id=$request->employee_id;
        $hk->status=$request->status;
        $hk->save();
        $room=Room::find($request->room_id);
        $room->hk_status=3;
        $room->save();
        $hk->employee=Employee::where('id',$request->employee_id)->select("first_name","last_name")->get();
        return res::S($hk);
    }

    public function changeStatus(Request $request){
        $hk=HKStatus::find($request->id);
        $hk->status=$request->status;
        $hk->save();
        $room=Room::find($hk->room_id);
        if($request->status==0){
            $room->hk_status=3;

        }else{

            $room->hk_status=0;
        }
        $room->save();
        return res::S("Status Changed SucessFully");
    }
    public function del($id){
        $hk=HKStatus::find($id);
        $hk->delete();
        return res::S("Status Deleted SucessFully");
    }
    
}

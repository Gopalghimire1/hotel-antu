<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\PaidService;
use App\Models\Reservation;
use App\Models\ReservationNight;
use App\Models\User;
use Illuminate\Http\Request;
use App\ApiData as res;
use App\Model\Room;
use App\Models\ReservationPaidService;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function reservation(Request $request){
        // dd($request);
        // dd($request->paid_service_id);
        $hastoken=true;
        while ($hastoken) {
            $tooken = mt_rand(111111,999999);
            $hastoken = User::where('unique_id',$tooken)->count()>0;
        }

        if($request->olduser == true){
            $user = User::where('unique_id',$request->unique_id)->first();
        }else{
            $user = new User();
            $user->password = bcrypt('guest123');
            $user->unique_id = $tooken;
            $user->role = 2;
            $user->save();
        }


        $guest = new Guest();
        $guest->email = $request->email;
        $guest->name = $request->name;
        $guest->phone = $request->phone;
        $guest->address = $request->address;
        $guest->nationality = $request->nationality;
        $guest->doc_type = $request->identity_type;
        $guest->id_number = $request->id_number;
        $guest->id_issue_date = $request->id_issue_date;
        $guest->id_expire_date = $request->id_expire_date;
        $guest->id_issued_place = $request->id_issued_place;
        $guest->card_no = $request->card_no;
        $guest->card_expire_date = $request->card_expire_date;
        $guest->ccv = $request->ccv;
        $guest->check_in = $request->check_in;
        $guest->adults = $request->adults;
        $guest->child = $request->child;
        $guest->user_id = $user->id;
        $guest->save();

        $resrv = new Reservation();
        $resrv->date = $request->date;
        $resrv->user_id = $user->id;
        $resrv->adults = $request->adults;
        $resrv->kids = $request->child;
        $resrv->check_in = $request->check_in;
        $resrv->number_of_room = $request->number_of_room;
        $resrv->status = 1;
        $resrv->guest_id = $guest->id;
        $resrv->save();

        foreach ($request->room_id as  $id) {
            $room = Room::where('id',$id)->first();
            $room->status = 2;
            $night = new ReservationNight();
            $night->reservation_id = $resrv->id;
            $night->room_id = $id;
            $night->date = Carbon::now();
            $night->check_in = $request->check_in;
            $night->price = $room->type->base_price;
            $room->save();
            $night->save();
        }

        foreach ($request->paid_service_id as $value) {
            $paid = new ReservationPaidService();
            $paid->reservation_id = $resrv->id;
            $paid->pad_service_id = $value;
            $paid->save();
        }
        return response()->json($guest);
    }

    public function all(Request $request){
  
        $data=[];
        $rev = Reservation::join('guests','guests.id','=','reservations.guest_id')->join('users','users.id','=','reservations.user_id')->select('reservations.id','reservations.check_in','reservations.adults','reservations.kids','reservations.number_of_room','guests.name','users.unique_id','reservations.check_out')->orderBy('reservations.id','desc')->get();
        foreach($rev as $r){
            $r->rooms=Room::join('reservation_nights',"reservation_nights.room_id",'=',"rooms.id")
            ->join('room_types','room_types.id','=','rooms.room_type_id')
            ->where('reservation_nights.reservation_id',$r->id)
            ->select("rooms.number","room_types.title")
            ->get();
            array_push($data,$r);
        }

        
        return  res::S(['reservation_list'=>$data]);
    }
    public function reservationList(){
  
        $data=[];
        $rev = Reservation::join('guests','guests.id','=','reservations.guest_id')->join('users','users.id','=','reservations.user_id')->where('reservations.check_out',null)->select('reservations.id','reservations.check_in','reservations.adults','reservations.kids','reservations.number_of_room','guests.name','users.unique_id')->orderBy('reservations.id','desc')->get();
        
        foreach($rev as $r){
            $r->rooms=Room::join('reservation_nights',"reservation_nights.room_id",'=',"rooms.id")
            ->join('room_types','room_types.id','=','rooms.room_type_id')
            ->where('reservation_nights.reservation_id',$r->id)
            ->select("rooms.number","room_types.title")
            ->get();
            array_push($data,$r);
        }
        return  res::S(['reservation_list'=>$data]);
    }


    public function singleReservation($id){
            $rev = Reservation::where('id',$id)->with('guest')->first();
            $rev->unique_id=$rev->user->unique_id;
            $night = ReservationNight::join('rooms','rooms.id','=','reservation_nights.room_id')
                    ->join('room_types','room_types.id','=','rooms.room_type_id')
                    ->join('room_type_images','room_type_images.room_type_id','=','room_types.id')
                    ->select('rooms.number','room_type_images.image','room_types.title','room_types.base_price')
                    ->where('reservation_nights.reservation_id',$rev->id)
                    ->where('room_type_images.featured',1)
                    ->get();
            $paid = ReservationPaidService::where('reservation_id',$rev->id)->with('paid_service')->get();
            return  res::S(['reservation'=> $rev,'reservation_night'=>$night,'reservation_paid_service'=>$paid]);
    }

    public function paidServices(){
        $paidServices = PaidService::where('status',1)->get();
        return  res::S($paidServices);
    }
}

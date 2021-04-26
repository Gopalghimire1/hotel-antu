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
use App\Models\ReservationPaidService;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function reservation(Request $request){
        // dd($request->all());
        $hastoken=true;
        while ($hastoken) {
            $tooken = mt_rand(111111,999999);
            $hastoken = User::where('unique_id',$tooken)->count()>0;
        }

        $user = new User();
        $user->password = bcrypt('guest123');
        $user->unique_id = $tooken;
        $user->role = 2;
        $user->save();
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
        $resrv->kids = $request->kids;
        $resrv->check_in = $request->check_in;
        $resrv->number_of_room = $request->number_of_room;
        $resrv->status = 1;
        $resrv->guest_id = $guest->id;
        $resrv->save();

        foreach ($request->room_id as  $id) {
            $night = new ReservationNight();
            $night->reservation_id = $resrv->id;
            $night->room_id = $id;
            $night->date = Carbon::now();
            $night->check_in = $request->check_in;
            $night->price = $request->price;
            $night->save();
        }

        foreach ($request->paid_service_id as $paid) {
            $paid = new ReservationPaidService();
            $paid->reservation_id = $resrv->id;
            $paid->pad_service_id = $paid;
            $paid->save();
        }
        return response()->json($guest);
    }

    public function guest(Request $request){
        // dd($request->all());


    }

    public function paidServices(){
        $paidServices = PaidService::where('status',1)->get();
        return  res::S($paidServices);
    }
}

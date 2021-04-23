<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\ReservationNight;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(Request $request){
        // dd($request->all());
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->role = 2;
        $user->password = bcrypt('user');
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->sex = $request->sex;
        $user->id_type = $request->id_type;
        $user->id_number = $request->id_number;
        $user->save();

        $resrv = new Reservation();
        $resrv->uid = $user->id_number;
        $resrv->date = $request->date;
        $resrv->user_id = $user->id;
        $resrv->room_type_id = $request->room_type_id;
        $resrv->adults = $request->adults;
        $resrv->kids = $request->kids;
        $resrv->check_in = $request->check_in;
        $resrv->check_out = $request->check_out;
        $resrv->number_of_room = $request->number_of_room;
        $resrv->status = $request->status;
        $resrv->save();

        foreach ($request->room_id as  $id) {
            $night = new ReservationNight();
            $night->reservation_id = $resrv->id;
            $night->room_id = $id;
            $night->date = $request->date;
            $night->check_in = $request->check_in;
            $night->check_out = $request->check_out;
            $night->price = $request->price;
            $night->save();
        }
        return response()->json($user);
    }

    public function guest(Request $request){
        // dd($request->all());
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
        $guest->save();
        return response()->json($guest);
    }
}

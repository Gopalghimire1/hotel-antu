<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index(){
        $reservations = [];
        return view('back.reservation.index',compact('reservations'));
    }

    public function create(Request $request){
        $guests = [];
        $room_types = [];
        $tax = 100;
        return view('back.reservation.create',compact('guests','room_types','tax'));
    }
}

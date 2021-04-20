<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(Request $request){
        dd($request->all());
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        return response()->json($user);
    }
}

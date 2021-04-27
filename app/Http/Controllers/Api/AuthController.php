<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ApiData as res;
use App\Models\Guest;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function emaillogin(Request $request)
    {
        $extrainfo = null;
        $user = null;
        $okk = false;
        $token = "";
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('logintoken')->accessToken;
            return res::s($user);
        }else{
            return res::f(["Email and Password Missmatch"]);
        }
    }

    public function authUser(){
        $user = Auth::user();
        if($user != null){
            return res::s($user);
        }else{
            return res::f(["User detail is not available"]);
        }
    }

    public function oldUser(Request $request){
        $user = User::where('role',2)->where('unique_id',$request->unique_id)->first();
        $guest = Guest::where('user_id',$user->id)->with('user')->first();
        return res::s($guest);
    }
}

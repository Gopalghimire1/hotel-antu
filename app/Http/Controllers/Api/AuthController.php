<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ApiData as res;
use App\Models\Employee;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function guestLogin(Request $request)
    {
        $user=User::where('unique_id',$request->id)->first();
        if($user!=null){
            if(Hash::check($request->password, $user->password)){
                $user->token = $user->createToken('logintoken')->accessToken;
                return res::s($user);
            }
        }
        res::f(['Login Failed']);
    }
    //kitchen login
    public function kitchenLogin(Request $request)
    {
        $extrainfo = null;
        $user = null;
        $okk = false;
        $token = "";
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('logintoken')->accessToken;
            if($user->role!=0 && $user->role!=1 &&$user->role!=5){
                return res::f(["Sorry You Are Not Authorized For Current Operation"]);
                
            }
            return res::s($user);
        }else{
            return res::f(["Email and Password Missmatch"]);
        }
    }

    //frontdesklogin
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

    public function employees(Request $request){
        $emp=Employee::join('users','users.id','=','employees.user_id')
            ->select('employees.*');
        if($request->withrole){
            $emp=$emp->where('users.role',$request->role);
        }
        return res::S($emp->get());
    }
}

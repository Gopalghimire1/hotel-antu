<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->getMethod()=="POST"){
            // dd($request->all());

            $request->validate([
                'email' => 'required',
                'password' => 'required|string',

            ]);
            $email=$request->email;
            $password=$request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
                    if(Auth::user()->role!=0){
                        Auth::logout();
                        return redirect()->back()->with('error_message','Permission Denied');
                    }
                    return redirect()->route(Auth::user()->getRole().'.dashboard');
            }else{
                return redirect()->back()->with('error_message','Credential do not match');
            }
        }else{
            return view('auth.login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}

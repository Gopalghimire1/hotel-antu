<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('back.users.index');
    }

    public function create(){
        return view('back.users.create');
    }

    public function store(Request $request){
       $request->validate([
        'username'=>'required|max:191|string|unique:users',
        'first_name'=>'required|max:191|string',
        'last_name'=>'required|max:191|string',
        'phone'=>'required|max:191|string',
        'email'=>'required|max:191|string',
        'address'=>'required|string',
        'sex'=>'required|string',
        'password'=>'required|string',
       ]);

       $guests = new User();
       $guests->username = $request->username;
       $guests->first_name = $request->first_name;
       $guests->last_name = $request->last_name;
       $guests->phone = $request->phone;
       $guests->email = $request->email;
       $guests->dob = $request->dob;
       $guests->address = $request->address;
       $guests->sex = $request->sex;
       $guests->role = $request->role;

       $guests->password = bcrypt($request->password);
       $guests->id_type = $request->id_type;
       $guests->id_number = $request->id_number;

       $guests->remarks = $request->remarks;
       $guests->vip = $request->has('vip')?1:0;
       $guests->status = $request->has('status')?1:0;
       //   dd($guests);
       $guests->save();
       return redirect()->back()->with('success','User has been saved successful');
    }
}

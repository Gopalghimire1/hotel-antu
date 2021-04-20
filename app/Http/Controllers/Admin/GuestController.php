<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class GuestController extends Controller
{
    public function index(){
        return view('back.guest.index');
    }

    public function create(){
        return view('back.guest.create');
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
        'picture'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'id_card_image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
       $guests->role = 2;
       if($request->has('picture')){
            $imageName = time().'.'.$request->picture->extension();
            $request->picture->move(public_path('back/images/guest/pic'), $imageName);
            $guests->picture = $imageName;
       }
       $guests->password = bcrypt($request->password);
       $guests->id_type = $request->id_type;
       $guests->id_number = $request->id_number;
       if($request->has('id_card_image')){
            $imageName = time().'.'.$request->id_card_image->extension();
            $request->id_card_image->move(public_path('back/images/guest/card'), $imageName);
            $guests->id_card_image = $imageName;
       }
       $guests->remarks = $request->remarks;
       $guests->vip = $request->has('vip')?1:0;
       $guests->status = $request->has('status')?1:0;
    //    dd($guests);
       $guests->save();
       return redirect()->back()->with('success','Guest has been saved successful');
    }
}

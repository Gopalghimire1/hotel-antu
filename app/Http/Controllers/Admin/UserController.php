<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\ApiData;

class UserController extends Controller
{
    public function index(){
        return view('back.users.index',['employees'=>Employee::all()]);
    }

    public function create(){
        return view('back.users.create');
    }

    public function store(Request $request){
       $request->validate([
        'first_name'=>'required|max:191|string',
        'last_name'=>'required|max:191|string',
        'phone'=>'required|max:191|string',
        'email'=>'required|max:191|string',
        'address'=>'required|string',
        'sex'=>'required|string',
        'password'=>'required|string',
       ]);

       $user =new User();
       $user->password = bcrypt($request->password);
       $user->email = $request->email;
       $user->role = $request->role;
       $user->save();

       $guests = new Employee();
       $guests->email = $request->email;
       $guests->first_name = $request->first_name;
       $guests->last_name = $request->last_name;
       $guests->phone = $request->phone;
       $guests->dob = $request->dob;
       $guests->address = $request->address;
       $guests->sex = $request->sex;
       $guests->remarks = $request->remarks;
       $guests->user_id=$user->id;
       $guests->save();
       return redirect()->route('user.index')->with('success','User has been saved successful');
    }

    public function edit(Employee $employee,Request $request){
        if($request->getMethod()=="POST"){
            $employee->email = $request->email;
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->phone = $request->phone;
            $employee->dob = $request->dob;
            $employee->address = $request->address;
            $employee->sex = $request->sex;
            $employee->remarks = $request->remarks;
            $employee->save();
            $user=$employee->user;
            $user->email=$request->email;
            $user->role=$request->role;
            $user->save();
            return redirect()->route('user.index')->with('success','User has been Updated successful');

        }else{
            return view('back.users.edit',compact('employee'));
        }
    }

    public function changePass(Request $request){
            $employee=Employee::find($request->id);
            $user=$employee->user;
            $user->password=bcrypt($request->password);
            $user->save();
            return ApiData::S("ok");

        
    }
}

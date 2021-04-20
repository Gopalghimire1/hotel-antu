<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaidService;
use Illuminate\Http\Request;

class PaidserviceController extends Controller
{
    public function index(){
        $services = PaidService::latest()->paginate(10);
        // dd($services);
        return view('back.paid_service.index',compact('services'));
    }

    public function create(){
        return view('back.paid_service.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $paid = new PaidService();
        $paid->title = $request->title;
        $paid->price_type = $request->price_type;
        $paid->price = $request->price;
        $paid->short_desc = $request->short_desc;
        $paid->long_desc = $request->description;
        $paid->status = $request->has('status')?1:0;
        $paid->image = $request->image->store('back/images/paid');
        $paid->save();
        return redirect()->back()->with('success','Service has been saved successful');
        // dd($paid);
    }

    public function edit($id){
        $paid = PaidService::where('id',$id)->first();
        return view('back.paid_service.edit',compact('paid'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $paid = PaidService::where('id',$id)->first();
        $paid->title = $request->title;
        $paid->price_type = $request->price_type;
        $paid->price = $request->price;
        $paid->short_desc = $request->short_desc;
        $paid->long_desc = $request->description;
        $paid->status = $request->has('status')?1:0;
        if($request->has('image')){
            unlink(public_path($paid->image));
            $paid->image = $request->image->store('back/images/paid');
        }
        $paid->save();
        return redirect()->back()->with('success','Service has been updated successful');
    }

    public function show($id){
        $paid = PaidService::where('id',$id)->first();
        return view('back.paid_service.show',compact('paid'));
    }

    public function delete($id){
        $paid = PaidService::where('id',$id)->first();
        $paid->delete();
        return redirect()->back()->with('success','Service has been deleted successful');
    }
}

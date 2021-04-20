<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $images=Image::all();
        return view('back.gallery.index',compact('images'));
    }
    public function add(Request $request){

        foreach ($request->images as $image) {
            $i=new Image();
            $i->caption=$request->caption;
            $i->image=$image->store("images/gallery");
            $i->save();
        }
        return redirect()->back();
    }

    public function del($id){
        $i=Image::find($id);
        if($i==null){
            return response('image not found',404);
        }
        $i->delete();
        return response('ok');
    }
}

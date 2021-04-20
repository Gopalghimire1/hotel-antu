<?php

namespace App\Http\Controllers;

use App\Model\RoomType;
use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function singleroom($id){
        //get singleroom;
        $singleroom= RoomType::find($id);
        return view('front.singleroom',compact('singleroom'));
    }

    public function experience(){
        return 'hello';
    }

    public function gallery(){
        return view('front.gallery',['images'=>Image::all()]);
    }

    public function suites(){
        $rooms = RoomType::all();
        return view('front.suite',compact('rooms'));
    }


    public function blog($type){
        return view('front.blog',['blogs'=>Blog::where('type',$type)->get(),'type'=>$type]);
    }
    public function blogSingle(Blog $blog){
    $others=Blog::where('type',$blog->type)->where('id','<>',$blog->id)->orderBy('id','desc')->take(20)->get();
        return view('front.blogsingle',compact('blog','others'));
    }
}

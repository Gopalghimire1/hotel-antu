<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($type){
        $blogs=Blog::where('type',$type)->get();
        return view('back.blog.index',compact('blogs','type'));
    }
    public function add($type ,Request $request){
        if($request->getMethod()=="GET"){
            return view('back.blog.add',compact('type'));
        }else{
            $blog=new Blog();
            $blog->title=$request->title;
            $blog->desc=$request->desc;
            $blog->feature=$request->feature->store('images/blog');
            $blog->type=$type;
            $blog->save();
            return redirect(route('admin.blog.home',['type'=>$type]));
        }
    }
    public function update(Blog $blog ,Request $request){
        if($request->getMethod()=="GET"){
            return view('back.blog.edit',compact('blog'));
        }else{
            $blog->title=$request->title;
            $blog->desc=$request->desc;
            if($request->hasFile('feature')){

                $blog->feature=$request->feature->store('images/blog');
            }

            $blog->save();
            return redirect(route('admin.blog.home',['type'=>$blog->type]));
        }
    }
    public function imageupload(Request $request){
        $data=$request->file->store('images/blog');
        return response()->json(['location'=>url($data)]);
    }
    public function del(Blog $blog){
        $type=$blog->type;
        $blog->delete();
        return redirect(route('admin.blog.home',['type'=>$type]));

    }
}

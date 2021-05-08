<?php

namespace App\Http\Controllers\Admin\Kitchen;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('back.kitchen.category.index',['cats'=>MenuCategory::all()]);
    }

    public function add(Request $request){
        $cat=new MenuCategory();
        $cat->name=$request->name;
        $cat->desc=$request->desc;
        if($request->hasFile('image')){

            $cat->image=$request->image->store('images/kitchen');
        }
        $cat->save();
        return view('back.kitchen.category.single',compact('cat'));
    }

    public function update(Request $request){
        $cat=MenuCategory::find($request->id);
        $cat->name=$request->name;
        $cat->desc=$request->desc;
        if($request->hasFile('image')){

            $cat->image=$request->image->store('images/kitchen');
        }
        $cat->save();
        return view('back.kitchen.category.single',compact('cat'));
    }
    public function del(Request $request){
        $cat=MenuCategory::find($request->id);
        $cat->delete();
        return response('ok');
    }


    public function manage(MenuCategory $cat){
        $items=MenuItem::where('menu_category_id',$cat->id)->get();
        return view('back.kitchen.item.index',compact('cat','items'));
    }

    //manage items
    public function addItem(Request $request){
        $item=new MenuItem();
        $item->name=$request->name;
        $item->desc=$request->desc;
        $item->price=$request->price;
        $item->menu_category_id=$request->menu_category_id;
        $item->room=$request->has('room')?1:0;
        $item->status=$request->has('room')?1:0;
        if($request->hasFile('image')){

            $item->image=$request->image->store('images/kitchen');
        }
        $item->save();
        return view('back.kitchen.item.single',compact('item'));
    }
    public function updateItem(Request $request){
        $item=MenuItem::find($request->id);
        $item->name=$request->name;
        $item->desc=$request->desc;
        $item->price=$request->price;
        $item->room=$request->has('room')?1:0;
        $item->status=$request->has('room')?1:0;
        if($request->hasFile('image')){
            $item->image=$request->image->store('images/kitchen');
        }
        $item->save();
        return view('back.kitchen.item.single',compact('item'));
    }

    public function delItem(Request $request){
        $item=MenuItem::find($request->id);
        $item->delete();
        return response('ok');
    }
}

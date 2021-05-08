<?php

namespace App\Http\Controllers\Api\Kitchen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiData as res;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index(){
        $menu=MenuCategory::with('menuitems')->get();
        return res::S($menu);
    }

    public function status(Request $request){
        $item=MenuItem::find($request->id);
        $item->status=$request->status?1:0;
        $item->save();
        res::S('Status CHanged Sucessfully');
    }
    
}

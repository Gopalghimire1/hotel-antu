<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RoomType;
use App\Model\Amenity;
use App\Model\RoomTypeImage;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::latest()->paginate(10);
        return view('back.roomType.index', compact('roomTypes'));
    }

    public function create()
    {
        $amenities = Amenity::where('status', '!=', 0)->get();
        return view('back.roomType.create', compact('amenities'));
    }




    public function store(Request $request)
    {

        // dd($request->all());
        $request['slug'] = Str::slug($request->title);
        $request->validate([
            'title' => 'required|max:191|unique:room_types',
            'slug' => 'required|max:191|unique:room_types',
            'short_code' => 'required|max:191|unique:room_types',
            'higher_capacity' => 'required|integer|min:1',
            'kids_capacity' => 'required|integer|min:0',
            'base_price' => 'required|numeric|min:0',
            'amenities' => 'nullable'
        ]);
        $roomType = new roomType();
        $roomType->title = $request->title;
        $roomType->slug = $request->slug;
        $roomType->short_code = $request->short_code;
        $roomType->description = $request->description;
        $roomType->higher_capacity = $request->higher_capacity;
        $roomType->kids_capacity = $request->kids_capacity;
        $roomType->base_price = $request->base_price;
        $roomType->status = $request->has('status') ? 1 : 0;
        $roomType->save();
        if ($request->has('amenities')) {
            $roomType->amenity()->attach($request->amenities);
        }

        foreach ($request->gallery_image as $value) {
            $image = new RoomTypeImage();
            $image->image = $value->store('back/images/roomtype');
            $image->room_type_id = $roomType->id;
            $image->save();
        }

        return redirect()->back()->with('success', 'Room Type created successful');
    }


    public function show(RoomType $roomType)
    {
        return view('back.roomType.show', compact('roomType'));
    }

    public function edit(RoomType $roomType)
    {
        $image = RoomTypeImage::where('room_type_id',$roomType->id)->get();
        $amenities = Amenity::where('status', '!=', 0)->get();
        return view('back.roomType.edit', compact('roomType', 'amenities','image'));
    }


    public function update(Request $request, RoomType $roomType)
    {
        $request['slug'] = Str::slug($request->title);
        $request->validate([
            'title' => 'required|max:191',
            'slug' => 'required|max:191',
            'short_code' => 'required|max:191',
            'higher_capacity' => 'required|integer|min:1',
            'kids_capacity' => 'required|integer|min:0',
            'base_price' => 'required|numeric|min:0',
            'amenities' => 'nullable'
        ]);

        $roomType->title = $request->title;
        $roomType->slug = $request->slug;
        $roomType->short_code = $request->short_code;
        $roomType->description = $request->description;
        $roomType->higher_capacity = $request->higher_capacity;
        $roomType->kids_capacity = $request->kids_capacity;
        $roomType->base_price = $request->base_price;
        $roomType->status = $request->has('status') ? 1 : 0;
        $roomType->save();

        if ($request->has('amenities')) {
            $roomType->amenity()->sync($request->amenities);
        } else {
            $roomType->amenity()->sync([]);
        }

        if($request->has('gallery_image')){
            foreach ($request->gallery_image as $value) {
                $image = new RoomTypeImage();
                $image->image = $value->store('back/images/roomtype');
                $image->room_type_id = $roomType->id;
                $image->save();
            }
        }

        return redirect()->back()->with('success', 'Room Type updated successful');
    }


    public function imageUpload(Request $request)
    {
        $request->validate([
            'room_type' => 'required|integer',
            'image' => 'required|max:2048',
        ]);
        if (($featured_image = RoomTypeImage::where('featured', 1)->where('room_type_id', $request->room_type)->first()) && $request->has('featured')) {
            $featured_image->featured = 0;
            $featured_image->save();
        }
        $roomTypeImage = new RoomTypeImage();
        $roomTypeImage->room_type_id = $request->room_type;
        if ($request->has('image')) {
            $roomTypeImage->image = $request->image->store('back/images/roomtype');
        }
        $roomTypeImage->featured = $request->has('featured') ? 1 : 0;
        // dd($roomTypeImage);
        $roomTypeImage->save();
        return redirect()->back()->with('success', 'Image Uploaded successful');
    }

    public function setImageFeatured($roomType, $image)
    {
        if ($featured_image = RoomTypeImage::where('featured', 1)->where('room_type_id', $roomType)->first()) {
            $featured_image->featured = 0;
            $featured_image->save();
        }
        $roomTypeImage = RoomTypeImage::find($image);
        $roomTypeImage->featured = 1;
        $roomTypeImage->save();
        return redirect()->back()->with('success', 'Featured image has been changed successful');
    }

    public function deleteImage($roomType, $image)
    {
        $roomTypeImage = RoomTypeImage::find($image);
        if ($roomTypeImage->featured == 0) {
            $roomTypeImage->delete();
            unlink(public_path($roomTypeImage->image));
            return redirect()->back()->with('success', 'Image has been deleted successful');
        } else {
            return redirect()->back()->with('warning', 'This image should not be delete');
        }
    }
}

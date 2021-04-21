<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
    public function amenity(){
        return $this->belongsToMany(Amenity::class,'room_type_pivot_amenity','room_type_id','amenity_id');
    }

    public function room(){
        return $this->hasMany(Room::class,'room_type_id')->where('status',1);
    }

    public function roomTypeImageAdmin(){
        return $this->hasMany(RoomTypeImage::class,'room_type_id');
    }

    public function roomTypeImage(){
        return $this->hasMany(RoomTypeImage::class,'room_type_id')->where('featured',0);
    }

    public function featuredImage(){
        return RoomTypeImage::where('featured',1)->where('room_type_id',$this->id)->first();
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    //
    public function roomType(){
        return $this->belongsToMany(RoomType::class,'room_type_pivot_amenity','amenity_id','room_type_id');
    }
}

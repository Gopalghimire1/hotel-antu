<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function type(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
    public function floor(){
        return $this->belongsTo(Floor::class,'floor_id');
    }
}

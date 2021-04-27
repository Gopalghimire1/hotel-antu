<?php

namespace App\Models;

use App\Model\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationNight extends Model
{
    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function rev_nights(){
        return $this->hasMany(ReservationNight::class);
    }

    public function rev_paid_services(){
        return $this->hasMany(ReservationPaidService::class);
    }

    public function guest(){
        return $this->belongsTo(Guest::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

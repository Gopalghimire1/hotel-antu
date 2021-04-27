<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationPaidService extends Model
{
    use HasFactory;

    public function paid_service(){
        return $this->belongsTo(PaidService::class,'pad_service_id');
    }

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
}

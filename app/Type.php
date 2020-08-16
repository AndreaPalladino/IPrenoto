<?php

namespace App;

use App\User;
use App\Booking;
use App\Location;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}

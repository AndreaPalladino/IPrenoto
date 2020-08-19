<?php

namespace App;

use App\Type;
use App\User;
use App\Booking;
use App\LocationImage;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function images(){
        return $this->hasMany(LocationImage::class);
    }
}

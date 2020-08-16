<?php

namespace App;

use App\Type;
use App\User;
use App\Location;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function type(){
      return $this->belongsTo(Type::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    static public function ToBeRevisionedCount(){
        return Booking::where('user_id', '=', auth()->user()->id)->count();
    }
}

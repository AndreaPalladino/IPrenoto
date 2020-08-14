<?php

namespace App;

use App\Type;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}

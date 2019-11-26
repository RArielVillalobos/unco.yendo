<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checking extends Model
{
    //

    public function traveler(){
        return $this->hasOne(Traveler::class);
    }
}

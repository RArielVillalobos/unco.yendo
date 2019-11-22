<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    //
    protected $fillable=['trip_id','user_id','me_subi'];

    public function trip(){
        return $this->belongsTo(Trip::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

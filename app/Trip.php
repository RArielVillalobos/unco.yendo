<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable=['calle','fecha','hora','lugares_disponibles','numero','user_id','latitud','longitud','ciudad'];




    public function conversation(){
        return $this->hasOne(Conversation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function requests(){
        return $this->hasMany(Request::class);
    }

}

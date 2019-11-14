<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    public function trip(){
        return $this->belongsTo(Trip::class);

    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}

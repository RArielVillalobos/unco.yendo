<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    //confirmado,pendiente,baja,cancelado
    //los que realizaron checking
    const CONFIRMADO='confirmado';
    //Fala realizar checking
    const PENDIENTE='pendiente';
    //dados de baja por el sistema, si no se realiza el checking'
    const BAJA='baja';
    //cuando se dan de baja
    const CANCELADO='cancelado';
    const ARRIBA='arriba';
    protected $fillable=['trip_id','user_id','me_subi','checking_id'];

    public function trip(){
        return $this->belongsTo(Trip::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function checking(){
        return $this->belongsTo(Checking::class);
    }

}

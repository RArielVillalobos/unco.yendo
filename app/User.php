<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','legajo','apellido','usuario','activo','verification_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messages(){
        return $this->belongsToMany(Message::class);
    }

    public function trips(){
        return $this->hasMany(Trip::class);
    }
    public function cars(){
        return $this->hasMany(Car::class);
    }

    //es estatico porque no es necesario instanciar la clase para acceder a el
    public static function generarVerificationToken(){
        return str_random(40);
    }

    //viajes a los que esta inscrito un usuario
    public function viajes(){
        return $this->hasMany(Traveler::class);
    }



}

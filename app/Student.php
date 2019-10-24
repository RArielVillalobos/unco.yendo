<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table='students';
    protected $fillable=['nombre','segundo_nombre','apellido','dni','legajo'];
    protected $hidden=['created_at','updated_at'];
}

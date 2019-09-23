<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable=['calle','fecha','hora','lugares_disponibles','numero','user_id'];
}

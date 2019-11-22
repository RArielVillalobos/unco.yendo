<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //

    public function index($idUser){
        $cars=Car::where('user_id','=',$idUser)->get();

        return $cars;

    }
}

<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    //

    public function create(Request $request){
       // $hora = strtotime($request->hora);
        $trip=Trip::create([
            'calle'=>$request->calle,
            'fecha'=>$request->fecha,
            'hora'=>$request->hora,
            'user_id'=>auth()->user()->id,
            'numero'=>$request->numero,
            'lugares_disponibles'=>$request->lugares_disponibles
        ]);

        return response()->json(['trip'=>$trip],200);
    }
}

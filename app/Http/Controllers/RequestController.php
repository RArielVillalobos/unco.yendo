<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    //

    public function store(Request $request){

        $request=\App\Request::create([
           'trip_id'=>$request->trip_id,
            'user_id'=>auth()->user()->id,

        ]);

        return back()->with("mensaje", 'Se envio la petición correctamente!');

    }
}

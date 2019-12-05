<?php

namespace App\Http\Controllers;
use App\Score;
use App\User;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //

    public function store(Request $request){
        dd($request->all());
    }
    public function ranking(){
        $usuarios = \DB::table('scores')->select('user_to_id','votos','comentario')
                     ->orderBy('votos','desc')
                    ->get();
        return view('trip.ranking',compact('usuarios'));
    }
}

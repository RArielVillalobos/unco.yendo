<?php

namespace App\Http\Controllers;
use App\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function ranking(){
        //$usuarios = \DB::table('scores')->select('user_to_id','comentario')->get();
        $usuarios = Score::all();
        return view('trip.ranking',compact('usuarios'));
    }
}

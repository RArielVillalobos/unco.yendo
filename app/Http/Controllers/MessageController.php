<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

    public function store(Request $request){
        $mensaje=Message::create([
            'conversation_id'=>$request->conversation_id,
            'mensaje'=>$request->mensaje,
            'user_id'=>auth()->user()->id

        ]);

        return back()->with("mensaje", 'Se envio correctamente el mensaje');

    }
}

<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController{

    //

    public function verify($token){
        //buscamos un usuario que tenga el token que recibimos en la peticion
        $user=User::where('verification_token',$token)->firstOrFail();
        $user->verified=1;
        //removemos el token para que no vuelva a ser verificado
        $user->verification_token=null;
        $user->save();
        return $this->showMessage('la cuenta ha sido verificada');
    }
}

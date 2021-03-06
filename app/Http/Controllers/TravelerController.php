<?php

namespace App\Http\Controllers;

use App\Checking;
use App\Traveler;
use App\Trip;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    //

    public function confirmarViaje(Request $request){
        //obtenemos el viajante
        $traveler=Traveler::findOrFail($request->traveler_id);
        $checking=new Checking();
        $checking->save();

        //$traveler->checking_id=
        $traveler->checking_id=$checking->id;
        $traveler->estado=Traveler::CONFIRMADO;
        $traveler->save();
        return 'checking realizado correctamente';

    }

    public function arriba($id){

        $traveler=Traveler::findOrFail($id);
        $traveler->estado=Traveler::ARRIBA;
        if($traveler->save()){
            return 'ok';
        }

    }

    public function terminar($id){
        $viaje=Trip::findOrFail($id);
        $viaje->estado=Trip::FINALIZAFO;
        if($viaje->save()){
            return back();
        }
        else{
            return 'error';
        }

    }
}

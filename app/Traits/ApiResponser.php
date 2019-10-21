<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser{
    //encargado de construir respuestas satisfactorias
    //parametros el dato y el codigo de la respuesta
    private function successResponse($data,$code){
        return response()->json($data,$code);
    }
    protected function errorResponse($message,$code){
        return response()->json(['error'=>$message,'code'=>$code],$code);
    }
    //mostrar una respuesta con multiples elementos(una coleccion) por ej lista de usuarios
    protected function showAll(Collection $collection,$code=200){
        return $this->successResponse(['data'=>$collection],$code);
    }
    protected function showOne(Model $instance,$code=200){
        return $this->successResponse(['data'=>$instance],$code);
    }
    protected function showMessage($message,$code=200){
        return $this->successResponse(['data'=>$message],$code);
    }
}
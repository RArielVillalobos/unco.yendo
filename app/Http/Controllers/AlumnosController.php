<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AlumnosController extends ApiController
{
    //

    public function index(){
        $alumnos=Student::all();
        return $this->showAll($alumnos,202);

    }

    public function show($legajo){

        $alumno=Student::where('legajo',$legajo)->first();
        //dd($alumno);

        return $this->showOne($alumno);


    }
    public function store(Request $request){
        $rules=[
            'apellido'=>'required',
            'nombre'=>'required',
            'legajo'=>'required',
            'dni'=>'required',
        ];
        $this->validate($request,$rules);
        $alumno=Student::create([
            'apellido'=>$request->apellido,
            'nombre'=>$request->nombre,
            'segundo_nombre'=>$request->segundo_nombre,
            'dni'=>$request->dni,
            'legajo'=>$request->legajo,
        ]);

        return $this->showOne($alumno,201);
    }

    public function destroy($legajo){
        $alumno=Student::where('legajo',$legajo)->first();
        $alumno->delete();
        return $this->showOne($alumno,200);

    }

    public function update(Request $request,$legajo){
        $alumno=Student::where('legajo',$legajo)->first();

        $alumno->nombre=$request->nombre;
        $alumno->segundo_nombre=$request->segundo_nombre;
        $alumno->apellido=$request->apellido;
        $alumno->dni=$request->dni;
        $alumno->legajo=$request->legajo;
        $alumno->save();

        //si la categoria se modifico
        $alumno->save();
        return $this->showOne($alumno);
    }
}

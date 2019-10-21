<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class AlumnosController extends ApiController
{
    //

    public function index(){
        $alumnos=Student::all();
        return $this->showAll($alumnos,202);

    }

    public function show($dni){
        $alumno=Student::where('dni',$dni)->first();
        return $this->showOne($alumno,202);

    }
}

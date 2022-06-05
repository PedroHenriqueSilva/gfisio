<?php

namespace App\Http\Controllers;
use App\Models\Consult_Exercise;
use App\Models\Exercise;
use App\Models\Consult;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Consult_ExerciseController extends Controller
{
    public function index($id){

        $exercises = Exercise::all(); 

        $data = Consult::join('avaliations','avaliations.id','=','consults.avaliation_id')
        ->join('users','users.id','=','avaliations.user_id')
        ->where('consults.id', $id)
        ->get();

        //verifica se existe exercicios da consulta cadastrados
        $consult_exercises = Consult_exercise::join('exercises','exercises.id','=','consult_exercises.exercise_id')
        ->where('consult_id', $id)
        ->get();
      
       
        return view('consult_exercises.show',['data'=>$data, 'id_consult'=>$id, 'exercises'=>$exercises ,'consult_exercises'=>$consult_exercises]);
    } 

   
    public function store(Request $request, $id) {

       $consult_exercises = new Consult_Exercise;

       $consult_exercises->consult_id = $id;
       $consult_exercises->exercise_id = $request->exercise_id;
       $consult_exercises->serie = $request->serie;
       $consult_exercises->repeat = $request->repeat;

       $consult_exercises->save();
        
        return redirect()
            ->route('consult_exercises', $id)
            ->with('msg', 'Exercício da consulta cadastrado com sucesso!');

                
        }
    
     public function add_execution(Request $request, $id){

        print($id);
        exit();

     }   

}

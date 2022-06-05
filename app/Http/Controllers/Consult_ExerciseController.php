<?php

namespace App\Http\Controllers;
use App\Models\Consult_Exercise;
use App\Models\Exercise;
use App\Models\Consult;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUpdateConsultExercise;

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
        ->select('consult_exercises.*','exercises.exercise_name')
        ->get()->toArray();

       
        return view('consult_exercises.show',['data'=>$data, 'id_consult'=>$id, 'exercises'=>$exercises ,'consult_exercises'=>$consult_exercises]);
    } 

   
    public function store(StoreUpdateConsultExercise $request, $id) {

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

       
        //busca id consulta
        $id_consult = Consult_Exercise::where('id', $request->consult_exercise_id)->first();
       
        
        Consult_Exercise::where('id', $request->consult_exercise_id)->update(['execution'=>$request->execution]);

        return redirect()
        ->route('consult_exercises', $id_consult['consult_id'])
        ->with('msg', 'Execução do exercício cadastrado com sucesso!');

     }   

    public function edit($id){
 
        $consult_exercises = Consult_Exercise::findOrFail($id);

        $data = Consult_Exercise::join('consults', 'consults.id','=','consult_exercises.consult_id')
        ->join('avaliations','avaliations.id','=','consults.avaliation_id')
        ->join('users','users.id','=','avaliations.user_id')
        ->where('consult_exercises.id', $id)
        ->get();

       return view('consult_exercises.edit',['consult_exercises' => $consult_exercises, 'data'=>$data]) ;
    }

    public function update(Request $request, $id){

        $data = $request->all();

        $consult_exercises = Consult_Exercise::findOrFail($id); 

        $consult_exercises->update($data);

        
         return redirect()
        ->route('consult_exercises', $consult_exercises['consult_id'])
        ->with('msg', 'Exercício da consulta editado com sucesso!');

    }

    public function destroy(Request $request, $id) {
            
        $consult_exercises = Consult_Exercise::where('id', $id)->first();
    
        
       
        $delete = Consult_Exercise::findOrFail($id)->delete();

        if($delete)
            return redirect()
            ->route('consult_exercises',$consult_exercises['consult_id'])
            ->with('msg', 'Exercício consulta excluído com sucesso!');
        else    
            return redirect()
            ->route('consult_exercises',$consult_exercises['consult_id'])
            ->with('msg', 'Erro ao excluir o exercício consulta! ');

    }
}
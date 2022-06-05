<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateShoulder;
use App\Models\Shoulder;
use App\Models\Dynamop;
use App\Models\Avaliation;
use App\Models\User;

class ShoulderController extends Controller
{
    public function index($id) {
        
        $shoulder = Shoulder::where('dynamop_id', $id)->first();

        if(is_null($shoulder)){
            $shoulder = "false";
        }
        else{
            $shoulder = $shoulder->toArray();
           
        }
        //verificar DYNAMOP a que pertence o shoulder//
        $dynamop = Dynamop::where('id',$id)->first();

        return view('shoulders.show', ['shoulder'=>$shoulder,'dynamop'=>$dynamop]); 


    }    
    public function store(StoreUpdateShoulder $request, $id) {

        $shoulders = new Shoulder;
     
        $shoulders->right_flexion = $request->right_flexion;
        $shoulders->left_flexion = $request->left_flexion;
        $shoulders->right_extension = $request->right_extension;
        $shoulders->left_extension = $request->left_extension;
        $shoulders->right_external_rotation = $request->right_external_rotation;
        $shoulders->left_external_rotation = $request->left_external_rotation;
        $shoulders->right_internal_rotation = $request->right_internal_rotation;
        $shoulders->left_internal_rotation = $request->left_internal_rotation;
        $shoulders->right_abduction = $request->right_abduction;
        $shoulders->left_abduction = $request->left_abduction;
        $shoulders->push_right_horizontal_arm = $request->push_right_horizontal_arm;
        $shoulders->push_left_horizontal_arm = $request->push_left_horizontal_arm;
        $shoulders->push_right_vertical_arm = $request->push_right_vertical_arm;
        $shoulders->push_left_vertical_arm = $request->push_left_vertical_arm;
        $shoulders->right_pull = $request->right_pull;
        $shoulders->left_pull = $request->left_pull;
        

        $shoulders->dynamop_id = $id;
        
        $shoulders->save();

        //verificar o id da avaliação do dynamop
        $dynamop = Dynamop::where('id', $id)->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Ombro cadastrada com sucesso!');

    }

    public function edit($id) {
        
        $shoulder = Shoulder::findOrFail($id);

        //função para buscar o dynamop, a avaliação e o paciente pelo id do shoulder
        $dynamop = Dynamop::where('id', $shoulder['dynamop_id'])->first()->toArray();

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $dynamop['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
       
      
       
        return view('shoulders.edit', ['shoulder' => $shoulder,'dynamop'=>$dynamop,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner ]);
  
    }

    public function update(StoreUpdateShoulder $request) {

        $data = $request->all();
      
        Shoulder::findOrFail($request->id)->update($data);

        //verificar o id do dynamop
        $shoulder = Shoulder::where('id', $request->id)->first()->toArray();

         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $shoulder['dynamop_id'])->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Ombro editado com sucesso!');
    }   

    public function destroy(Request $request, $id) {

        //verificar o id do dynamop
        $shoulder = Shoulder::where('id', $id)->first()->toArray();
        
        $delete = Shoulder::findOrFail($id)->delete();


         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $shoulder['dynamop_id'])->first()->toArray();
       
        if($delete)
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Dynamop: Ombro excluído com sucesso!');
        else    
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Erro ao excluir o Ombro');

    }

    public function relatorio($id){

        $shoulder = Shoulder::findOrFail($id);

        //função para buscar o dynamop, a avaliação e o paciente pelo id do shoulder
        
        $data = Shoulder::join('dynamops','dynamops.id','=','shoulders.dynamop_id')
                ->join('avaliations','avaliations.id','=','dynamops.avaliation_id')
                ->join('users','users.id','=','avaliations.user_id')
                ->where('shoulders.id', $id)
                ->get();
       
     
       
        return view('shoulders.relatorio', ['shoulder' => $shoulder, 'data' =>$data]);
  
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateHip_Knee;
use App\Models\Hip_Knee;
use App\Models\Dynamop;
use App\Models\Avaliation;
use App\Models\User;

class Hip_KneeController extends Controller
{
    public function store(StoreUpdateHip_Knee $request, $id) {

        $hips_knees = new Hip_Knee;
     
        $hips_knees->right_hip_extension = $request->right_hip_extension;
        $hips_knees->left_hip_extension = $request->left_hip_extension;

        $hips_knees->right_hip_flexion = $request->right_hip_flexion;
        $hips_knees->left_hip_flexion = $request->left_hip_flexion;

        $hips_knees->right_hip_abduction = $request->right_hip_abduction;
        $hips_knees->left_hip_abduction = $request->left_hip_abduction;

        $hips_knees->right_hip_adduction = $request->right_hip_adduction;
        $hips_knees->left_hip_adduction = $request->left_hip_adduction;

        $hips_knees->right_knee_flexion = $request->right_knee_flexion;
        $hips_knees->left_knee_flexion = $request->left_knee_flexion;

        $hips_knees->right_knee_extension = $request->right_knee_extension;
        $hips_knees->left_knee_extension = $request->left_knee_extension;
        
        $hips_knees->dynamop_id = $id;
        
        $hips_knees->save();

        //verificar o id da avaliação do dynamop
        $dynamop = Dynamop::where('id', $id)->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Dynamop: Quadril/Joelho cadastrado com sucesso!');

    }

    public function edit($id) {
        
        $hip_knee = Hip_Knee::findOrFail($id);

       
        
        //função para buscar o dynamop, a avaliação e o paciente pelo id do hip
        $dynamop = Dynamop::where('id', $hip_knee['dynamop_id'])->first()->toArray();

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $dynamop['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
           
        return view('hips_knees.edit', ['hip_knee' => $hip_knee,'dynamop'=>$dynamop,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner ]);
  
    } 


    public function update(StoreUpdateHip_Knee $request) {

        $data = $request->all();
      
        Hip_Knee::findOrFail($request->id)->update($data);

        //verificar o id do dynamop
        $hip_knee = Hip_Knee::where('id', $request->id)->first()->toArray();

         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $hip_knee['dynamop_id'])->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Dynamop: Quadril/Joelho editado com sucesso!');
    }   

    public function destroy(Request $request, $id) {

        //verificar o id do dynamop
        $hip_knee = Hip_Knee::where('id', $id)->first()->toArray();
        
        $delete = Hip_Knee::findOrFail($id)->delete();


         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $hip_knee['dynamop_id'])->first()->toArray();
       
        if($delete)
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Dynamop: Quadril/Joelho excluído com sucesso!');
        else    
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Erro ao excluir o Quadril/Joelho');

    }

    public function relatorio($id){

        $hip_knee = Hip_Knee::findOrFail($id);

        //função para buscar o dynamop, a avaliação e o paciente pelo id do Hip_Knee
        
        $data = Hip_Knee::join('dynamops','dynamops.id','=','hips_knees.dynamop_id')
                ->join('avaliations','avaliations.id','=','dynamops.avaliation_id')
                ->join('users','users.id','=','avaliations.user_id')
                ->where('hips_knees.id', $id)
                ->get();
      
       
        return view('hips_knees.relatorio', ['hip_knee' => $hip_knee, 'data' =>$data]);
  
    }
}    
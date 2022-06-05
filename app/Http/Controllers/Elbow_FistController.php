<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateElbow_Fist;
use App\Models\Elbow_Fist;
use App\Models\Dynamop;
use App\Models\Avaliation;
use App\Models\User;


class Elbow_FistController extends Controller
{
    public function store(StoreUpdateElbow_Fist $request, $id) {

        $elbows_fists = new Elbow_Fist;
     
        $elbows_fists->right_elbow_flexion = $request->right_elbow_flexion;
        $elbows_fists->left_elbow_flexion = $request->left_elbow_flexion;

        $elbows_fists->right_elbow_extension = $request->right_elbow_extension;
        $elbows_fists->left_elbow_extension = $request->left_elbow_extension;

        $elbows_fists->right_fist_flexion = $request->right_fist_flexion;
        $elbows_fists->left_fist_flexion = $request->left_fist_flexion;

        $elbows_fists->right_fist_extension = $request->right_fist_extension;
        $elbows_fists->left_fist_extension = $request->left_fist_extension;

        $elbows_fists->right_supination = $request->right_supination;
        $elbows_fists->left_supination = $request->left_supination;

        $elbows_fists->right_pronation = $request->right_pronation;
        $elbows_fists->left_pronation = $request->left_pronation;
        
        $elbows_fists->dynamop_id = $id;
        
        $elbows_fists->save();

        //verificar o id da avaliação do dynamop
        $dynamop = Dynamop::where('id', $id)->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Dynamop: Cotovelo/Punho cadastrado com sucesso!');

    }

    public function edit($id) {
        
        $elbow_fist = Elbow_Fist::findOrFail($id);

             
        //função para buscar o dynamop, a avaliação e o paciente pelo id do elbow_fist
        $dynamop = Dynamop::where('id', $elbow_fist['dynamop_id'])->first()->toArray();

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $dynamop['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
       
           
        return view('elbows_fists.edit', ['elbow_fist' => $elbow_fist,'dynamop'=>$dynamop,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner ]);
  
    }

    public function update(StoreUpdateElbow_Fist $request) {

        $data = $request->all();
      
        Elbow_Fist::findOrFail($request->id)->update($data);

        //verificar o id do dynamop
        $elbow_fist = Elbow_Fist::where('id', $request->id)->first()->toArray();

         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $elbow_fist['dynamop_id'])->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Dynamop: Cotovelo/Punho editado com sucesso!');
    }   

    public function destroy(Request $request, $id) {

        //verificar o id do elbow_fist
        $elbow_fist = Elbow_Fist::where('id', $id)->first()->toArray();
        
        $delete = Elbow_Fist::findOrFail($id)->delete();


         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $elbow_fist['dynamop_id'])->first()->toArray();
       
        if($delete)
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Dynamop: Cotovelo/Punho excluído com sucesso!');
        else    
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Erro ao excluir o Cotovelo/Punho');

    }

    public function relatorio($id){

        $elbow_fist = Elbow_Fist::findOrFail($id);

        //função para buscar o dynamop, a avaliação e o paciente pelo id do Elbow_Fist
        
        $data = Elbow_Fist::join('dynamops','dynamops.id','=','elbows_fists.dynamop_id')
                ->join('avaliations','avaliations.id','=','dynamops.avaliation_id')
                ->join('users','users.id','=','avaliations.user_id')
                ->where('elbows_fists.id', $id)
                ->get();
      
       
        return view('elbows_fists.relatorio', ['elbow_fist' => $elbow_fist, 'data' =>$data]);
  
    }
}

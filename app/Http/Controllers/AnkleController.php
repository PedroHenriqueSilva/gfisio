<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateAnkle;
use App\Models\Ankle;
use App\Models\Dynamop;
use App\Models\Avaliation;
use App\Models\User;


class AnkleController extends Controller
{
    public function store(StoreUpdateAnkle $request, $id) {

        $ankles = new Ankle;
     
        $ankles->right_plantar_flexion = $request->right_plantar_flexion;
        $ankles->left_plantar_flexion = $request->left_plantar_flexion;

        $ankles->right_dorsiflexion = $request->right_dorsiflexion;
        $ankles->left_dorsiflexion = $request->left_dorsiflexion;

        $ankles->right_inversion = $request->right_inversion;
        $ankles->left_inversion = $request->left_inversion;

        $ankles->right_eversion = $request->right_eversion;
        $ankles->left_eversion = $request->left_eversion;
        
        $ankles->dynamop_id = $id;
        
        $ankles->save();

        //verificar o id da avaliação do dynamop
        $dynamop = Dynamop::where('id', $id)->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Dynamop: Tornozelo cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $ankle = Ankle::findOrFail($id);

       //função para buscar o dynamop, a avaliação e o paciente pelo id do ankle
       $dynamop = Dynamop::where('id', $ankle['dynamop_id'])->first()->toArray();

       //funcao busca o usuario pelo id da avaliacao
       $avaliation = Avaliation::where('id', $dynamop['avaliation_id'])->first()->toArray();

       //busca as informações usuário
       $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
      
      
        return view('ankles.edit', ['ankle' => $ankle, 'dynamop'=>$dynamop,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner ]);
  
    }

    public function update(StoreUpdateAnkle $request) {

        $data = $request->all();
      
        Ankle::findOrFail($request->id)->update($data);

        //verificar o id do dynamop
        $ankle = Ankle::where('id', $request->id)->first()->toArray();

         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $ankle['dynamop_id'])->first()->toArray();

        return redirect()
            ->route('dynamop.info', $dynamop['avaliation_id'])
            ->with('msg', 'Dynamop: Tornozelo editado com sucesso!');
    }   

    public function destroy(Request $request, $id) {

        //verificar o id do dynamop
        $ankle = Ankle::where('id', $id)->first()->toArray();
        
        $delete = Ankle::findOrFail($id)->delete();


         //verificar o id da avaliação do dynamop
         $dynamop = Dynamop::where('id', $ankle['dynamop_id'])->first()->toArray();
       
        if($delete)
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Dynamop: Tornozelo excluído com sucesso!');
        else    
            return redirect()
                ->route('dynamop.info', $dynamop['avaliation_id'])
                ->with('msg', 'Erro ao excluir o Tornozelo');

    }

    public function relatorio($id){

        $ankle = Ankle::findOrFail($id);

        //função para buscar o dynamop, a avaliação e o paciente pelo id do Ankle
        
        $data = Ankle::join('dynamops','dynamops.id','=','ankles.dynamop_id')
                ->join('avaliations','avaliations.id','=','dynamops.avaliation_id')
                ->join('users','users.id','=','avaliations.user_id')
                ->where('ankles.id', $id)
                ->get();
      
       
        return view('ankles.relatorio', ['ankle' => $ankle, 'data' =>$data]);
  
    }
}

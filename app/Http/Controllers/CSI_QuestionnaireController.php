<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateCSI_Questionnaire;
use App\Models\CSI_Questionnaire;
use App\Models\Questionnaire;
use App\Models\Avaliation;
use App\Models\User;
use File; 

class CSI_QuestionnaireController extends Controller
{
    public function index($id) {
        
        $csi_questionnaire = CSI_Questionnaire::where('questionnaire_id', $id)->first();

        if(is_null($csi_questionnaire)){
            $csi_questionnaire = "false";
        }
        else{
            $csi_questionnaire = $csi_questionnaire->toArray();
            
        }

        //verificar questionário a que pertence o csi_questionário//
        $questionnaire = Questionnaire::where('id',$id)->first();

        //verificar a avaliação que o questionário pertence//
        $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first();
       
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
        

        return view('csi_questionnaires.show', ['avaliationOwtner'=>$avaliationOwtner,'avaliation'=>$avaliation, 'questionnaire'=>$questionnaire, 'csi_questionnaire'=>$csi_questionnaire]); 

    }

    public function store(StoreUpdateCSI_Questionnaire $request, $id){

        $csi_questionnaire = new CSI_Questionnaire;

        // Image Upload
        if($request->hasFile('csi_img') && $request->file('csi_img')->isValid()) {

            $requestImage = $request->csi_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/csi_questionnaire'), $imageName);
    
            $csi_questionnaire->csi_img = $imageName;

        }

        $csi_questionnaire->csi_score = $request->csi_score;
        $csi_questionnaire->questionnaire_id = $id;

        $csi_questionnaire->save();

        return redirect()
        ->route('csi_questionnaire', $id)
        ->with('msg', 'Questionário CSI cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $csi_questionnaire = CSI_Questionnaire::findOrFail($id);

        //função para buscar o questionnaire 
       $questionnaire = Questionnaire::where('id', $csi_questionnaire['questionnaire_id'])->first()->toArray();

       //funcao busca o usuario pelo id da avaliacao
       $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first()->toArray();

       //busca as informações usuário
       $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('csi_questionnaires.edit', ['csi_questionnaire' => $csi_questionnaire,'questionnaire'=>$questionnaire,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function update(StoreUpdateCSI_Questionnaire $request, $id){

        $data = $request->all();

        if (!$csi_questionnaire = CSI_Questionnaire::find($id)) {
            return redirect()->back();
        }

        // Image Upload
        if($request->hasFile('csi_img') && $request->file('csi_img')->isValid()) {

            File::delete('img/csi_questionnaire/'. $csi_questionnaire->csi_img);  
            
                           

            $requestImage = $request->csi_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/csi_questionnaire'), $imageName);
    
            $data['csi_img'] = $imageName;

        }

        $csi_questionnaire->update($data);

        
        return redirect()
        ->route('csi_questionnaire', $csi_questionnaire['questionnaire_id'])
        ->with('msg', 'Questionário CSI editado com sucesso!');
    }


    public function destroy(Request $request, $id) {
        
        //busca id do questionário pelo id csi_questionário
        $questionnaire = CSI_Questionnaire::where('id', $id)->first();

        if ( !$csi_questionnaire = CSI_Questionnaire::find($id) )
            return redirect()->back();
        
      
        File::delete('img/csi_questionnaire/'. $csi_questionnaire->csi_img); 

        $delete = CSI_Questionnaire::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('csi_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Questionário CSI excluído com sucesso!');
        else    
            return redirect()
                ->route('csi_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Erro ao excluir o questionário CSI');

    }
}
